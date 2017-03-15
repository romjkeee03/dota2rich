@extends('layout')

@section('content')
<div class="home-page">

        <div class="game-info-block get-winner game-end-page">
            <div class="title">Раунд <span>#{{ $game->id }}</span>, в банке <span><span>{{ round($game->price) }}</span> руб.</span></div>
			<div class="wrapper-progress-bar">
                <h3>Собрано предметов:</h3>
                <div class="progress-digits"><span>{{ $game->items }}</span> / 100</div>
                <div id="progress-bar">
                    <div style="width: {{ $game->items }}%"></div>
                </div>
            </div>
            <div class="winner-info">
                <ul>
                    <li><span class="inline-block">Победный билет:</span><span class="value inline-block">#{{ $game->ticket }}</span></li>
                    <li><span class="inline-block">Победитель:</span><span class="value inline-block">{{ $game->winner->username }}</span></li>
                    <li><span class="inline-block">Выигрыш:</span><span class="value inline-block">{{ $game->price }} руб.</span></li>
                </ul>
            </div>

            <div class="fair-play">
                <a class="fancybox" href="#fairplay"><span>Честная игра</span></a>
                <p>Хеш раунда: <span id="roundHashUp">{{ md5($game->rand_number) }}</span></p>
            </div>
        </div> <!-- End of Game Info Block -->
    </div>

    <div class="game-deposits-block">
        <div class="container">
            <div class="end-notice">
                <div class="icon"></div>
                <div class="title">Игра закончилась!</div>
                <p>Число раунда: <span>{{ $game->rand_number }}</span></p>
            </div>
			<div id="bets">
			@foreach($bets as $bet)
				@include('includes.bet')
			@endforeach
                   <div class="start-notice">
                <div class="icon"></div>
                <div class="title">Игра началась, вносите депозиты!</div>
                <p>Хеш раунда: <span>{{ md5($game->rand_number) }}</span></p>
            </div> <!-- End of Start Notice -->
        </div>
    </div>
@endsection