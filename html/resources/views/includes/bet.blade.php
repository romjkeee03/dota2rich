    <div class="player-deposits" id="bet_{{ $bet->id }}">
        <div class="avatar">
            <a class="fancybox" data-profile="{{ $bet->user->steamid64 }}" href="#player-modal"><img src="{{ $bet->user->avatar }}" alt=""></a>
        </div>
        <div class="title left"><a class="fancybox" data-profile="{{ $bet->user->steamid64 }}" href="#player-modal">{{ $bet->user->username }}</a> <?php echo trans('game.contributed'); ?> <span>{{ $bet->itemsCount }} {{ trans_choice('options.items', $bet->itemsCount) }}</span>, <?php echo trans('game.amount'); ?> <span>~{{ $bet->price }} <?php echo trans('options.currencyhead'); ?></span>
            <span class="grey chance_{{ $bet->user->steamid64 }}">({{ \App\Http\Controllers\GameController::_getUserChanceOfGame($bet->user, $bet->game) }} %)</span></div>
        <div class="tickets right" data-toggle="tooltip" title="<?php echo trans('game.one_ticket'); ?>" ><span><?php echo trans('game.from'); ?></span> #{{ $bet->from }} <span><?php echo trans('game.to'); ?></span> #{{ $bet->to }}</div>
        <div class="list-deposits clr-b">
		@foreach(json_decode($bet->items) as $i)
                        <div class="item @if(!isset($i->img)){{ $i->rarity }} @else card {{ ($i->color) }} @endif left">
                                    <div class="image">
						@if(!isset($i->img))
                        <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/{{ \App\Http\Controllers\GameController::APPID }}/{{ $i->classid }}/200fx200f">
						@else
						<span>CARD</span>{{ $i->price }}
						@endif
                        <div class="desc">{{ $i->name }}</div>
                    </div>
                                <div class="price">{{ $i->price }} <?php echo trans('options.currencyhead'); ?></div>
            </div>
			@endforeach
                        <div class="clr-b"></div>
		</div>
    </div> <!-- End of Player Deposits -->