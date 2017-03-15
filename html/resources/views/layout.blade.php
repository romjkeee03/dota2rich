<!doctype html>

<html class="no-js" lang="{{ Config::get('languages')[App::getLocale()] }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo trans('options.title'); ?></title>
    <meta name="keywords" content="<?php echo trans('options.keywords'); ?>" />
    <meta name="description" content="<?php echo trans('options.description'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{!!  csrf_token()   !!}">
    <link rel="icon" type="image/ico" href="/favicon.ico"/>
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.countdown.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/multiple-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:500,300,400&subset=latin,cyrillic' />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}" ></script>
	<script src="{{ asset('assets/js/userChat.js') }}" ></script> 
    <script src="{{ asset('assets/js/jquery.fancybox.pack.js') }}" ></script>
	<script src="{{ asset('assets/js/jquery.countdown.js') }}" ></script>
	<script src="{{ asset('assets/js/jquery.waterwheelCarousel.min.js') }}" ></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}" ></script>
	<script src="{{ asset('assets/js/jquery.multiple.select.js') }}" ></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" ></script>
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>	
	$(document).ready(function() {

            $(".fancybox").fancybox({
                maxWidth: 600
            });
			
			$('#live-chat .button').click(function(){
                if($('#live-chat').hasClass('open')) {
                    $('#live-chat').removeClass('open');
                } else {
                    $('#live-chat').addClass('open');
                }
                return false;
            });
        });
	
    @if(!Auth::guest())
        const USER_ID = '{{ $u->steamid64 }}';
    @endif
        const LANG = '{{ Config::get('languages')[App::getLocale()] }}';
		const KURS = 64;
        var START = true;
    </script>
</head>
<body>
    <div id="loader" class="corner">
        <div class="loader-inner ball-clip-rotate-multiple blue-loader">
            <div></div><div></div>
        </div>
    </div>
    <audio id="newBet" src="{{ asset('assets/sounds/newBet.ogg') }}" preload="auto"></audio>
    <audio id="scrollSlider" src="{{ asset('assets/sounds/scroll.mp3') }}" preload="auto"></audio>
<div class="wrapper-all">

    <!-- Header -->

    <div id="header">

        <div id="top">
            <div class="container">
                <div class="logo left">
                    <a href="/"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
                </div>
                <div class="main-menu left">
                    <ul>
                        <li><a href="/top"><span><?php echo trans('menu.top'); ?></span></a></li>
                        <li><a href="#" onclick="$.notify('<?php echo trans('notice.shop_off'); ?>'); return false;"><span><?php echo trans('menu.shop'); ?></span></a></li>
                        <li><a href="/history"><span><?php echo trans('menu.history'); ?></span></a></li>
                        <li><a href="/about"><span><?php echo trans('menu.about'); ?></span></a></li>
                        <li><a href="/support"><span><?php echo trans('menu.support'); ?></span></a></li>
                    </ul>
                </div>
                <a href="#fairplay" class="fancybox">
                <div class="protection-info left"><?php echo trans('menu.md5'); ?></div>
                </a>

				@if(Auth::guest())
				<div class="steam-button right">
                    <a href="/login"><?php echo trans('menu.login'); ?></a>
                </div>
				@else
			<div class="steam-profile right">
                    <div class="user-avatar left">
                        <a href="#player-modal" data-profile="{{ $u->steamid64 }}" class="fancybox" title="{{ $u->username }}"><img src="{{ $u->avatar }}" alt=""></a>
                    </div>
                    <div class="user-info left">
                        <div class="user-name">
                            <a href="#player-modal" data-profile="{{ $u->steamid64 }}" class="fancybox">{{ $u->username }}</a>
                        </div>
                        <div class="user-balance">
                            <!-- <a href="http://cshot.ru/logout">Выйти</a>
                            <a class="fancybox" href="#donate-modal">Баланс <span id="u_balance">0 рублей</span></a>-->
                            <a class="fancybox" href="#donate-modal"><?php echo trans('options.balance'); ?>: <span class="update_balance">{{ $u->money }}</span></a>
                        </div>
                        <div class="user-settings">
                            <a href="#link" class="fancybox" title="<?php echo trans('menu.settings'); ?>"><?php echo trans('menu.settings'); ?></a>
                        </div>
                        <div class="logout">
                            <a href="/logout" title="<?php echo trans('menu.logout'); ?>">logout</a>
                        </div>
                    </div>
                    <div class="clr-b"></div>
                </div>
				@endif
				<div class="langs clr-b">
					<a href="/lang/ru" title="<?php echo trans('menu.ru'); ?>"><img src="{{ asset('assets/images/lang_ru.png') }}" alt=""></a>
					<a href="/lang/en" title="<?php echo trans('menu.en'); ?>"><img src="{{ asset('assets/images/lang_en.png') }}" alt=""></a>
				</div>
            </div>
        </div> <!-- End of Top -->

        <div class="stats">
        <div class="container">
          <div class="item separator inline-block">
            <span id="online" >0</span><?php echo trans('stats.online'); ?>
          </div>
          <div class="item game-section separator inline-block">
            <span id="gamesToday">{{ \App\Game::gamesToday() }}</span><?php echo trans('stats.game'); ?>
          </div>
          <div class="item players-section separator inline-block">
            <span id="usersToday">{{ \App\Game::usersToday() }}</span><?php echo trans('stats.players'); ?>
          </div>
          <div class="item  separator inline-block">
            <span id="maxPriceToday">{{ \App\Game::maxPriceToday() }} <span class="currency"><?php echo trans('options.currencyhead'); ?></span></span><?php echo trans('stats.max_win_today'); ?>
          </div>
          <div class="item inline-block">
            <span id="maxPrice">{{ \App\Game::maxPrice() }} <span class="currency"><?php echo trans('options.currencyhead'); ?></span></span><?php echo trans('stats.max_win'); ?>
          </div>
        </div>
      </div> <!-- End of Stats -->

      <div class="rules">
        <div class="container">
          <div class="item icon-info left">
            <p><?php echo trans('rules.info'); ?></p>
          </div>
          <div class="item icon-money left">
            <p><?php echo trans('rules.money'); ?> - {{ $max_items = \App\Http\Controllers\GameController::MAX_ITEMS }} {{ trans_choice('options.items', $max_items) }}<br><?php echo trans('rules.money2'); ?> - {{ $min_price = \App\Http\Controllers\GameController::MIN_PRICE }} {{ trans_choice('options.currency', $min_price) }}</p>
          </div>
          <div class="item icon-cup left">
            <p><?php echo trans('rules.cup'); ?></p>
          </div>
          <div class="item icon-percent left">
            <p><?php echo trans('rules.percent'); ?></p>
          </div>
          <div class="clr-b"></div>
        </div>
      </div> <!-- End of Rules -->

        <div class="notice">
            <a href="#" onclick="$.notify('<?php echo trans('notice.shop_off'); ?>'); return false;"><span><?php echo trans('notice.shop'); ?></span></a>
        </div> <!-- End of Notice -->

	    </div>

    <!-- End of Header -->
        <div id="content">
            @yield('content')
        </div>
    </div>
	
	
	
    <!-- modals-start -->
<div id="fairplay" class="modal-content">
        <?php echo trans('fairplay.text'); ?>
            <form onsubmit="return false;">
                <input type="text" class="inputbox" value="" id="roundHash1" placeholder="<?php echo trans('fairplay.hash'); ?>"><br>
                <input type="text" class="inputbox" value="" id="roundNumber1" placeholder="<?php echo trans('fairplay.round_number'); ?>"><br>
                <input type="text" class="inputbox" value="" id="roundPrice1" placeholder="<?php echo trans('fairplay.round_price'); ?>"><br>
                <input type="submit" class="btn" id="checkHash" value="<?php echo trans('fairplay.sumbit'); ?>">
            </form>
           <center> <div id="checkResult"></div> </center>
        </div>
    </div>
	
    <div id="player-modal" class="modal-content">
        <div class="loading"><?php echo trans('profile.loading'); ?></div>
        <div class="hide" style="display: none;">
            <div class="player-avatar inline-block">
                <img src="">
            </div>
            <div style="overflow: auto;">
                <div class="player-name">-</div>
                <div class="player-link">
                    <a href="#" target="_blank">-</a>
                </div>
                <div class="player-reputation">
                    <?php echo trans('profile.rep'); ?>: <span class="value">-</span> <span class="plus vote">+</span>
                </div>
                <div class="player-stats">
                    <div class="item games-played separator inline-block">
                        <span>-</span><?php echo trans('profile.games'); ?>
                    </div>
                    <div class="item games-won separator inline-block">
                        <span>-</span><?php echo trans('profile.wins'); ?>
                    </div>
                    <div class="item winrate separator inline-block">
                        <span>-%</span>Win rate
                    </div>
                    <div class="item totalBank inline-block">
                        <span>-</span><?php echo trans('profile.total'); ?> (<?php echo trans('options.currencyhead'); ?>)
                    </div>
                </div>
                <div class="player-stats-table">
                    <table>
                        <thead>
                        <tr>
                            <td><?php echo trans('profile.game'); ?></td>
                            <td><?php echo trans('profile.chance'); ?></td>
                            <td><?php echo trans('profile.jackpot'); ?> (<?php echo trans('options.currencyhead'); ?>)</td>
                            <td><?php echo trans('profile.status'); ?></td>
                        </tr>
                        </thead>
                        <tbody class="games-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- End of Player Modal -->
	@if(Auth::guest())
		
	@else
	<div id="link" class="modal-content" style="text-align: center;">
        <p><?php echo trans('settings.link'); ?></p>
        <p><?php echo trans('settings.sure'); ?></p>
        <br>
        <input id="settings_link" placeholder="<?php echo trans('settings.input'); ?>" class="inputbox" value="{{ $u->trade_link }}" type="text" style="width: 300px;" >
        <input type="button" class="save-link2 btn" value="<?php echo trans('settings.save'); ?>" style="width: 320px;">
    </div> <!-- End of Link Modal -->
	@endif
	<div id="deposit" class="modal-content">
        <form action="/deposit" target="_blank">
            <input type="button" class="btn" value="<?php echo trans('deposit.browser'); ?>" onclick="$(this).parent().submit();  $.fancybox.close();">
        </form>
        <form action="/deposit2">
            <input type="button" class="btn" value="<?php echo trans('deposit.client'); ?>" onclick="$(this).parent().submit();  $.fancybox.close();">
        </form>
    </div> <!-- End of Unitpay Modal -->
	
	<!-- 
    <div id="unitpay-modal" class="modal-content">
        <form action="">
            <input placeholder="Сумма пополнения" class="inputbox" name="sum" type="text">
            <input type="hidden" name="account" value="10576">
            <input type="hidden" name="desc" value="Пополнение счета"><br>
            <input type="button" class="btn" value="Пополнить" onclick="$(this).parent().submit();">
        </form>
    </div> End of Unitpay Modal -->
    <div id="donate-modal" class="modal-content">
    <!--
       <form method="post" action="/donate/redirect" target="_blank">
            <input placeholder="Сумма пополнения" class="inputbox" name="summ" type="text">
            <input type="hidden" name="_token" value="96gszWzOykZYGExmaJfFatOGQA10PltX1JeBcJW8">
            <input type="button" class="btn" value="Пополнить" onclick="$(this).parent().submit();">
        </form> 
        -->
       <form method="post" action="#" target="_blank">
            <!--<input type="button" class="btn" value="<?php echo trans('donate.add_balance'); ?>" onclick="$(this).parent().submit();">-->
			<input type="button" class="btn" value="<?php echo trans('donate.add_balance'); ?>" onclick="$.notify('<?php echo trans('donate.add_balance_off'); ?>'); return false;">
        </form> 

    </div> <!-- End of Unitpay Modal -->

    <!-- modals-end -->
	
		<div id="live-chat" class="round-corners open">
        <div class="wrapper">

            <a class="button round-corners" href="#"><?php echo trans('chat.title'); ?> <span class="online"><?php echo trans('chat.online'); ?>: <span>0</span></span><span class="arrow"></span></a>
		    <div class="list-messages">
              <div class="wrapper-messages">
			<div  id="chat_messages"></div>
		</div>
			</div>
			  @if(!Auth::guest())
			<div class="new-message">
                <input id="sendie" type="text" class="inputbox round-corners" placeholder="<?php echo trans('chat.enter'); ?>" autocomplete="off" value="">
            </div>
			  @else
			<div class="new-message">
                <input id="" type="text" class="inputbox round-corners" placeholder="<?php echo trans('chat.enter'); ?>" autocomplete="off" value="">
			</div>
			  @endif
            
        </div>
            </div>
         <!-- End of New Message -->

	
	<div id="vk">
      <div class="wrapper">
        <a href="skype:shifts6?add"><img src="/assets/images/skype.png" alt=""></a>
        <div class="description">Купить скрипт можно тут!</div>
      </div>
    </div>
	
</body>
<script src="https://cdn.socket.io/socket.io-1.3.5.js"></script>
<script src="{{ asset('assets/js/app.js') }}" ></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65019168-1', 'auto');
  ga('send', 'pageview');

</script>
<script>
    @if(!Auth::guest())
    function updateBalance() {
        $.post('{{route('get.balance')}}', function (data) {
            $('.update_balance').text(data);
        });
    }
    function addTicket(id, btn){
        $.post('{{route('add.ticket')}}',{id:id}, function(data){
            updateBalance();
            return $(btn).notify(data.text, {position: 'top middle', className :data.type});
        });
    }
    @endif

</script>
</html>
