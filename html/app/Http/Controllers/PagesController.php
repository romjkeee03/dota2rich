<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Game;
use App\Item;
use App\Services\SteamItem;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function about()
    {
        return view('pages.about');
    }

	public function support()
    {
        return view('pages.support');
    }
	
    public function shop()
    {
        return view('pages.shop');
    }
	
    public function top()
    {
        $users = \DB::table('users')
            ->select('users.id',
				'users.username',
                'users.avatar',
                'users.steamid64',
                \DB::raw('SUM(games.price) as top_value'),
                \DB::raw('COUNT(games.id) as wins_count')
            )
            ->join('games', 'games.winner_id', '=', 'users.id')
            ->groupBy('users.id')
            ->orderBy('top_value', 'desc')
            ->limit(20)
            ->get();
        $place = 1;
        $i = 0;
		foreach($users as $u){
			$users[$i]->games_played = count(\DB::table('games')
				->join('bets', 'games.id', '=', 'bets.game_id')
				->where('bets.user_id', $u->id)
				->groupBy('bets.game_id')
				->select('bets.id')->get());
			$users[$i]->win_rate = round($users[$i]->wins_count / $users[$i]->games_played, 3) * 100;
			$i++;
		}
        return view('pages.top', compact('users', 'place'));
    }

    public function profile()
    {
        $games = Game::where('winner_id', $this->user->id)->get();
        $wins = $games->count();
        $gamesPlayed = count(\DB::table('games')
            ->join('bets', 'games.id', '=', 'bets.game_id')
            ->where('bets.user_id', $this->user->id)
            ->groupBy('bets.game_id')
            ->select('bets.id')->get());
        $looses = $gamesPlayed - $wins;
        $win_price = $games->sum('price');
        return view('pages.profile', compact('wins', 'looses', 'win_price'));
    }

    public function settings()
    {
        return view('pages.settings');
    }

    public function myhistory()
    {
        $games = \DB::table('games')
            ->join('bets', function($join){
                $join->on('games.id', '=', 'bets.game_id')
                    ->where('bets.user_id', '=', $this->user->id);
            })
            ->join('users', 'games.winner_id', '=', 'users.id')
            ->groupBy('games.id')
            ->orderBy('games.id', 'desc')
            ->select('games.*', 'users.username as winner_username', 'users.steamid64 as winner_steamid64')
            ->get();

        return view('pages.myhistory', compact('games'));
    }

    public function history()
    {
        $games = Game::with(['bets', 'winner'])->where('status', Game::STATUS_FINISHED)->orderBy('created_at', 'desc')->simplePaginate(50);
        return view('pages.history', compact('games'));
    }

    public function game($gameId)
    {
        if(isset($gameId) && Game::where('status', Game::STATUS_FINISHED)->where('id', $gameId)->count()){
            $game = Game::with(['winner'])->where('status', Game::STATUS_FINISHED)->where('id', $gameId)->first();
            $game->ticket = floor($game->rand_number * ($game->price * 100));
            $bets = $game->bets()->with(['user','game'])->get()->sortByDesc('created_at');
            $chances = [];
            return view('pages.game', compact('game', 'bets', 'chances'));
        }
        return redirect()->route('index');
    }

    public function myinventory(Request $request)
    {
        if($request->getMethod() == 'GET'){
            return view('pages.myinventory');
        }else{
            if(!\Cache::has('inventory_' . $this->user->steamid64)) {
                $jsonInventory = file_get_contents('http://steamcommunity.com/profiles/' . $this->user->steamid64 . '/inventory/json/730/2?l=russian');
                $items = json_decode($jsonInventory, true);
                if ($items['success']) {
                    foreach ($items['rgDescriptions'] as $class_instance => $item) {
                        $info = Item::where('market_hash_name', $item['market_hash_name'])->first();
                        if (is_null($info)) {
                            $info = new SteamItem($item);
                            if ($info->price != null) {
                                Item::create((array)$info);
                            }
                        }
                        $items['rgDescriptions'][$class_instance]['price'] = $info->price;
                    }

                }
                \Cache::put('inventory_' . $this->user->steamid64, $items, 15);
            }else{
                $items = \Cache::get('inventory_' . $this->user->steamid64);
            }
            return $items;
        }
    }
}
