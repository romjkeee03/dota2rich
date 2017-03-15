@extends('layout')

@section('content')
    <div class="history-games-block">
        <div class="history-games-body">
            <div class="pageTitle">История моих игр<br><span style="color: #75A0B2; font-size: 11px;">Показаны последние 50 игр</span></div>
            @forelse($games as $game)
                <div class="history-prize-block">
					@if($game->winner_id == $u->id)
						<div class="order-status sended">Победа</div>
					@else
						<div class="order-status error">Проигрыш</div>
					@endif
                    <ul>
                        <li>
                            Игра <span>#{{ $game->id }}</span> <a href="/game/{{ $game->id }}" style="color: #33BDA6; font-size: 13px; text-transform: uppercase;">Посмотреть полную историю игры</a>
                        </li>
                        <li>
                            Победил: <a href="#" data-profile="{{ $game->winner_steamid64 }}">{{ $game->winner_username }}</a>
                        </li>
                        <li>
                            Сумма джекпота: <span>{{ $game->price }}р</span>
                        </li>
                    </ul>
                </div>
            @empty
                <center><h1 style="color: #33BDA6;">Игр нет!</h1></center>
            @endforelse
        </div>
    </div>
@endsection