<div class="game-deposits-block">
<div class="container">
<div id="bets">
                            <div class="player-deposits" id="bet_{{ $bet->id }}">
        <div class="avatar">
            <a class="fancybox" data-profile="{{ $bet->user->steamid64 }}" href="#player-modal"><img src="{{ $bet->user->avatar }}" alt=""></a>
        </div>
        <div class="title left"><a class="fancybox" data-profile="{{ $bet->user->steamid64 }}" href="#player-modal">{{ $bet->user->username }}</a> внёс <span>{{ $bet->itemsCount }} {{ trans_choice('lang.items', $bet->itemsCount) }}</span>, на сумму <span>~{{ $bet->price }} руб.</span>
            <span class="grey chance_{{ $bet->user->steamid64 }}">({{ \App\Http\Controllers\GameController::_getUserChanceOfGame($bet->user, $bet->game) }} %)</span></div>
        <div class="tickets right" data-toggle="tooltip" title="1р = 1 билет" ><span>Билет от</span> #{{ $bet->from }} <span>до</span> #{{ $bet->to }}</div>
        <div class="list-deposits clr-b">
		@foreach(json_decode($bet->items) as $i)
                        <div class="item  rare  left">
                                    <div class="image">
						@if(!isset($i->img))
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/{{ \App\Http\Controllers\GameController::APPID }}/{{ $i->classid }}/200fx200f">
						@else
						<img src="{{ asset($i->img) }}">
						@endif
                        <div class="desc">{{ $i->name }}</div>
                    </div>
                                <div class="price">{{ $i->price }} руб.</div>
            </div>
                        <div class="clr-b"></div>
        @endforeach
		</div>
    </div> <!-- End of Player Deposits -->
	</div>
	</div>
	</div>