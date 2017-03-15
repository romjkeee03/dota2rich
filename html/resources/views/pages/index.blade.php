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
                <h3><?php echo trans('game.new_game'); ?>:</h3>
                <div id="ngtimer">PT30S</div>
            </div>
                            <div class="play-button">
                    <a href="#deposit" class="fancybox" ><?php echo trans('game.deposit_first'); ?></a>
                </div>
                    </div> <!-- End of Game Info Block -->

        <div id="gameInfo" class="game-info-block">
            <div class="title">
                <?php echo trans('game.round'); ?> <span id="roundId">#{{ $game->id }}</span>, <?php echo trans('game.bank'); ?> <span><span id="roundBank">{{ round($game->price) }}</span> <?php echo trans('options.currencyhead'); ?></span>
                                @if(!Auth::guest())
								<?php echo trans('game.chance'); ?> <span id="myChance">{{ $user_chance }}</span><span>%</span>
								@endif
                            </div>
            <div class="wrapper-progress-bar">
                <h3><?php echo trans('game.progress'); ?>:</h3>
                <div class="progress-digits"><span>{{ $game->items }}</span> / 100</div>
                <div id="progress-bar">
                    <div style="width: {{ $game->items }}%"></div>
                </div>
            </div>
            <div class="wrapper-timer" style="display: none;">
                <h3><?php echo trans('game.timer'); ?>:</h3>
                <div id="timer">PT120S</div>
            </div>
                            @if(!Auth::guest())
							<div id="playButton" class="play-button @if(empty($u->accessToken)) no-link @endif">
								<a href="#deposit" class="fancybox"><?php echo trans('game.play'); ?></a>
							</div>
							@else
							<div id="playButton" class="play-button">
								<a href="{{ route('login') }}"><?php echo trans('game.play'); ?></a>
							</div>
							@endif
							
                        <div class="fair-play">
                <a class="fancybox" href="#fairplay"><span><?php echo trans('game.fairplay'); ?></span></a>
                <p><?php echo trans('game.hash'); ?>: <span id="roundHash">{{ md5($game->rand_number) }}</span></p>
            </div>
        </div> <!-- End of Game Info Block -->
    </div>
    <div class="notice error-msg linkMsg msgs-not-visible">
        <div class="offer-link-inMsgCont">
            <?php echo trans('game.link1'); ?>
			<?php echo trans('game.link2'); ?>
            <div class="offer-link-inMsg">
                <div class="input-group-inMsg">
                    <input placeholder="<?php echo trans('game.link3'); ?>" value="" type="text">
                    <button type="submit" class="input-group-addon-inMsg save-link2"><?php echo trans('game.link4'); ?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="notice wait-msg queueMsg msgs-not-visible">
        <div class="gametimeCont"><?php echo trans('game.wait'); ?><br><u style="font-weight: 400; color: #F2F2F2;"></u></div>
    </div>

    <div class="notice error-msg declineMsg msgs-not-visible">
        <div class="gametimeCont"><?php echo trans('game.error'); ?><br><u style="font-weight: 400; color: #F2F2F2;"></u></div>
    </div>
	
@if(!Auth::guest())
        <div class="game-cards-block">
        <div class="wrapper">
            <div class="info inline-block"><?php echo trans('game.info'); ?></div>
			<div class="available inline-block">
									<ul>
                                        @foreach(\App\Ticket::all() as $ticket)
										<li class="{{ $ticket->color }} inline-block" title="<?php echo trans('game.card'); ?> {{ $ticket->price }} <?php echo trans('options.currencyhead'); ?>"><a href="#" onclick="addTicket({{ $ticket->id }}, this); return false;"><span>Card</span>{{ $ticket->price }}</a></li>
										@endforeach
                                    </ul>
            </div>
            <div class="buy-cards inline-block">
                <a class="fancybox" href="#donate-modal"><?php echo trans('options.balance'); ?> <span class="update_balance" >{{ $u->money }} {{ trans_choice('options.currency', $u->money) }}</span></a>
            </div>
        </div>
    </div> <!-- End of Game Cards Block -->
@endif

	<div id="game-chances" class="msgs-not-visible">
    </div>

	<div class="game-deposits-block">
	<div class="container">
			<div class="end-notice msgs-not-visible">
                <div class="icon"></div>
                <div class="title"><?php echo trans('game.game_end'); ?></div>
                <p><?php echo trans('game.round_num'); ?>: <span class="roundNumber">-</span></p>
            </div>
	<div id="bets">
        @foreach($bets as $bet)
            @include('includes.bet')
        @endforeach
    </div>
	<div class="start-notice">
                <div class="icon"></div>
                <div class="title"><?php echo trans('game.game_start'); ?></div>
                <p><?php echo trans('game.hash'); ?>: <span id="roundHash">{{ md5($game->rand_number) }}</span></p>
            </div> <!-- End of Start Notice -->
	</div>
	</div>
	
@endsection