@extends('layout')

@section('content')
 <div class="history-page container">
        <h1><?php echo trans('history.title'); ?></h1>
        <div class="pre"><?php echo trans('history.pre'); ?></div>

        <table>
            <thead>
            <tr>
                <td><?php echo trans('history.game'); ?></td>
                <td><?php echo trans('history.winner'); ?></td>
                <!--<td><?php echo trans('history.chance'); ?></td>-->
                <td><?php echo trans('history.jackpot'); ?></td>
                <td><?php echo trans('history.status'); ?></td>
            </tr>
            </thead>
            <tbody>
            @forelse($games as $game)
            <tr>
            <td><a href="/game/{{ $game->id }}" class="game-id">#{{ $game->id }}</a></td>
                <td class="player-info" width="100%">
                    <div class="player-avatar inline-block">
                        <a href="#player-modal" class="fancybox" data-profile="{{ $game->winner->steamid64 }}" ><img src="{{ $game->winner->avatar }}" alt=""></a>
                    </div>
                    <div class="player-name inline-block">
                        <a href="#player-modal" class="fancybox" data-profile="{{ $game->winner->steamid64 }}">{{ $game->winner->username }}</a>
                    </div>
                </td>
                <!--<td><div class="player-jackpot">{{ \App\Http\Controllers\GameController::_getUserChanceOfGame($game->winner, $game) }} <span>%</span></div></td>-->
                <td><div class="player-jackpot">{{ $game->price }} <span><?php echo trans('options.currencyhead'); ?></span></div></td>
                 <div class="history-prize-block">
                 @if($game->status_prize == \App\Game::STATUS_PRIZE_WAIT_TO_SENT)
                     <td><div class="game-status processing"><?php echo trans('history.wait_to_send'); ?></div></td>
                 @elseif($game->status_prize == \App\Game::STATUS_PRIZE_SEND)
                    <td><div class="game-status"><?php echo trans('history.send'); ?></div></td>
                 @else
                    <td><div class="game-status error"><?php echo trans('history.error'); ?></div></td>
                 @endif
            </tr>
            @empty
                <center><h1 style="color: #33BDA6;"><?php echo trans('history.no_games'); ?></h1></center>
            @endforelse
                        </tbody>
        </table>

        </div>
    </div>
@endsection