@extends('layout')

@section('content')
            <div class="home-page">

        <div class="game-info-block get-winner game-end-page msgs-not-visible">
            <div class="wrapper-carousel">

                <div class="all-players">
                    <ul class="all-players-list">
                    </ul>
                </div>
            </div>
            <div class="winner-info">
                <ul>
                    <li><span class="inline-block">Победный билет:</span><span id="winTicket" class="value inline-block">#0</span></li>
                    <li><span class="inline-block">Победитель:</span><span id="winUser" class="value inline-block">???</span></li>
                    <li><span class="inline-block">С шансом:</span><span id="winChance" class="value inline-block">???%</span></li>
                    <li><span class="inline-block">Выигрыш:</span><span id="winBank" class="value inline-block">0 руб.</span></li>
                </ul>
            </div>
            <div class="wrapper-timer">
                <h3>Новая игра через:</h3>
                <div id="ngtimer">PT30S</div>
            </div>
                            <div class="play-button">
                    <a href="#deposit" class="fancybox" >Внести предметы первым</a>
                </div>
                    </div> <!-- End of Game Info Block -->

        <div id="gameInfo" class="game-info-block">
            <div class="title">
                Раунд <span id="roundId">#{{ $game->id }}</span>, в банке <span><span id="roundBank">{{ round($game->price) }}</span> руб.</span>
                                @if(!Auth::guest())
								ваш шанс <span id="myChance">{{ $user_chance }}</span><span>%</span>
								@endif
                            </div>
            <div class="wrapper-progress-bar">
                <h3>Собрано предметов:</h3>
                <div class="progress-digits"><span>{{ $game->items }}</span> / 100</div>
                <div id="progress-bar">
                    <div style="width: {{ $game->items }}%"></div>
                </div>
            </div>
            <div class="wrapper-timer" style="display: none;">
                <h3>Конец раунда через:</h3>
                <div id="timer">PT120S</div>
            </div>
                            <div id="playButton" class="play-button @if(empty($u->accessToken)) no-link @endif">
                    <a href="#deposit" class="fancybox">Внести предметы</a>
                </div>
                        <div class="fair-play">
                <a class="fancybox" href="#fairplay"><span>Честная игра</span></a>
                <p>Хеш раунда: <span id="roundHash">{{ md5($game->rand_number) }}</span></p>
            </div>
        </div> <!-- End of Game Info Block -->
    </div>
    <div class="notice error-msg linkMsg msgs-not-visible">
        <div class="offer-link-inMsgCont">
            Введите ссылку на обмен <a href="http://steamcommunity.com/id/me/tradeoffers/privacy#trade_offer_access_url" target="_blank">Узнать ссылку на обмен</a>
			<a href="http://steamcommunity.com/profiles/76561198074521068/edit/settings" target="_blank">Обязательно откройте инвентарь в Steam для получения приза!</a>
            <div class="offer-link-inMsg">
                <div class="input-group-inMsg">
                    <input placeholder="Вставьте ссылку на обмен..." value="" type="text">
                    <button type="submit" class="input-group-addon-inMsg save-link2">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="notice wait-msg queueMsg msgs-not-visible">
        <div class="gametimeCont">Подождите, ваш запрос обрабатывается<br><u style="font-weight: 400; color: #F2F2F2;"></u></div>
    </div>

    <div class="notice error-msg declineMsg msgs-not-visible">
        <div class="gametimeCont">Ваше предложение обмена отклонено<br><u style="font-weight: 400; color: #F2F2F2;"></u></div>
    </div>

@if(!Auth::guest())
        <div class="game-cards-block">
        <div class="wrapper">
            <div class="info inline-block">Вместо предметов вы можете вносить наши карточки.<br>Потом эти карточки можно обменивать на предметы.</div>
            <div class="available inline-block">
                <ul>
                                        <li class="blue inline-block" title="Карточка на 50 руб"><a href="#" onclick="addTicket(1, this); return false;"><span>Card</span>50</a></li>
                                        <li class="green inline-block" title="Карточка на 100 руб"><a href="#" onclick="addTicket(2, this); return false;"><span>Card</span>100</a></li>
                                        <li class="purple inline-block" title="Карточка на 350 руб"><a href="#" onclick="addTicket(3, this); return false;"><span>Card</span>350</a></li>
                                        <li class="red inline-block" title="Карточка на 1000 руб"><a href="#" onclick="addTicket(4, this); return false;"><span>Card</span>1,000</a></li>
                                        <li class="blue2 inline-block" title="Карточка на 3500 руб"><a href="#" onclick="addTicket(5, this); return false;"><span>Card</span>3,500</a></li>
                                    </ul>
            </div>
            <div class="buy-cards inline-block">
                <a class="fancybox" href="#donate-modal">Баланс <span class="update_balance" >{{ $u->money }} {{ trans_choice('lang.rubles', $u->money) }}</span></a>
            </div>
        </div>
    </div> <!-- End of Game Cards Block -->
@endif

	<div class="game-deposits-block">
	<div class="container">
	<div id="bets">
        @foreach($bets as $bet)
            @include('includes.bet')
        @endforeach
    </div>
	<div class="start-notice">
                <div class="icon"></div>
                <div class="title">Игра началась, вносите депозиты!</div>
                <p>Хеш раунда: <span id="roundHash">{{ md5($game->rand_number) }}</span></p>
            </div> <!-- End of Start Notice -->
	</div>
	</div>
	
@endsection