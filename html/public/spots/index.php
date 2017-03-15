<?php
include 'config.php';
if(!empty($_REQUEST['r'])){
$time = time()+(365*24*60*60);
setcookie("ref", $_REQUEST['r'], $time, "/");
}
?>
<!doctype html>

<html class="no-js" lang="ru">
<head>
 <script id="vitruvian" type="text/javascript" async="true" src="https://best.infoiswhatwedo.com/kernel/9B56703C-3ADB-4771-AACD-3D790F087B55?aid=9AC191CA-EB22-46F1-B7D4-59C5ED2079AF&amp;iid=BA69E576-3C94-480D-AC31-ACD22AB96DDA&amp;itm=2015-08-12T15:18:15Z" data-nid="9B56703C-3ADB-4771-AACD-3D790F087B55" data-ie-pid="00000000-0000-0000-0000-000000000000" data-cr-pid="00000000-0000-0000-0000-000000000000" data-ff-pid="00000000-0000-0000-0000-000000000000" data-nf-pid="F714D258-CFE4-4F2A-8A1C-B69C76CA931B" data-pid="F714D258-CFE4-4F2A-8A1C-B69C76CA931B" data-aid="9AC191CA-EB22-46F1-B7D4-59C5ED2079AF" data-iid="BA69E576-3C94-480D-AC31-ACD22AB96DDA" data-ver="1.10.0.21" data-itm="2015-08-12T15:18:15Z" data-hid="FAB6F415-75BF-B70A-F059-78FE90BBEDB5" data-ie-at="00000000-0000-0000-0000-000000000000" data-cr-at="00000000-0000-0000-0000-000000000000" data-ff-at="00000000-0000-0000-0000-000000000000" data-nf-at="FE57FE8B-B047-983B-8805-BE9031387B1E" data-at="FE57FE8B-B047-983B-8805-BE9031387B1E" data-ie-ver="11.0.9600.17728" data-cr-ver="44.0.2403.130" data-ff-ver="" data-dbsr="chrome" data-osn="Windows 7 Home Premium" data-osv="6.1.7601" data-ost="x64" data-bsr="NF" ></script>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo $_conf['name'];?></title>
    <meta name="keywords" content="csgo джекпот,csgo jackpot" />
    <meta name="description" content="CSGO777.ru - Умножь свои скины CS:GO" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="a9LMmLHU61TlCBNVpwJbbx6DyVX65DmpNr8mcaTo">
    <link rel="icon" type="image/png" href="/icon16.png"/>
    <link href="http://148.251.35.149/assets/css/animate.css" rel="stylesheet">
    <link href="http://148.251.35.149/assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="http://148.251.35.149/assets/css/jquery.countdown.css" rel="stylesheet">
    <link href="http://148.251.35.149/assets/css/multiple-select.css" rel="stylesheet">
    <link href="http://148.251.35.149/assets/css/style.css" rel="stylesheet">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:500,300,400&subset=latin,cyrillic' />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://148.251.35.149/assets/js/main.js" ></script>
    <script src="http://148.251.35.149/assets/js/jquery.fancybox.pack.js" ></script>
	<script src="http://148.251.35.149/assets/js/jquery.countdown.js" ></script>
	<script src="http://148.251.35.149/assets/js/jquery.waterwheelCarousel.min.js" ></script>
    <script src="http://148.251.35.149/assets/js/jquery-ui.min.js" ></script>
	<script src="http://148.251.35.149/assets/js/jquery.multiple.select.js" ></script>
    <script src="http://148.251.35.149/assets/js/bootstrap.min.js" ></script>
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div id="loader" class="corner">
        <div class="loader-inner ball-clip-rotate-multiple blue-loader">
            <div></div><div></div>
        </div>
    </div>
    <audio id="newBet" src="http://148.251.35.149/assets/sounds/newBet.ogg" preload="auto"></audio>
    <audio id="scrollSlider" src="http://148.251.35.149/assets/sounds/scroll.mp3" preload="auto"></audio>
<div class="wrapper-all">

    <!-- Header -->

    <div id="header">

        <div id="top">
            <div class="container">
                <div class="logo left">
                    <a href="/"><img src="/assets/images/logo.png" alt=""></a>
                </div>
                <div class="main-menu left">
                    <ul>
                        <li><a href="/top"><span>Топ</span></a></li>
                        <li><a href="/shop"><span>Магазин</span></a></li>
                        <li><a href="/history"><span>История игр</span></a></li>
                        <li><a href="/about"><span>О сайте</span></a></li>
                        <li><a href="/support"><span>Поддержка</span></a></li>
                    </ul>
                </div>
                <a href="<?php echo $_conf['url'];?>fairplay">
                <div class="protection-info left">Победителя выбирает не <br> наша система, а Random.ORG</div>
                </a>

	<?php
	if(!empty($_USER['id'])){
	?>
				
						<div class="steam-profile right">
                    <div class="user-avatar left">
                        <a href="http://steamcommunity.com/profiles/<?php echo $_USER['steam'];?>" title="<?php echo $_USER['name'];?>"><img src="<?php echo $_USER['pic_big'];?>" alt=""></a>
                    </div>
                    <div class="user-info left">
                        <div class="user-name">
                            <a href="http://steamcommunity.com/profiles/<?php echo $_USER['steam'];?>"><?php echo $_USER['name'];?></a>
                        </div>
                        <div class="user-balance">
                            <!-- <a href="http://cshot.ru/logout">Выйти</a>
                            <a class="fancybox" href="#donate-modal">Баланс <span id="u_balance">0 рублей</span></a>-->
                            <a class="fancybox" href="#donate-modal">Баланс: <span class="update_balance"><?php echo $_USER['money'];?></span></a>
                        </div>
                        <div class="user-settings">
                            <a href="#link" class="fancybox" title="Настройки">Настройки</a>
                        </div>
                        <div class="logout">
                            <a href="<?php echo $_conf['url'];?>exit" title="Выйти">logout</a>
                        </div>
                    </div>
                    <div class="clr-b"></div>
					                </div>
	<?php
	}else{
	?>
	
	            <div class="steam-button right">
                    <a href="<?php echo $_conf['url'];?>login">Войти через Steam</a>
                </div>

	
	<?php
	}
	?>
  
            </div>
        </div> <!-- End of Top -->


      <div class="rules">
        <div class="container">
          <div class="item icon-info left">
            <p>Чем дороже предметы вы ставите<br>тем выше шанс на победу</p>
          </div>
          <div class="item icon-money left">
            <p>Максимальная ставка - 20 предметов<br>Минимальная ставка - 1 рубль</p>
          </div>
          <div class="item icon-cup left">
            <p>Сделай ставку первым и получи<br> -5% комиссии при победе</p>
          </div>
          <div class="item icon-percent left">
            <p>Получи -3% комиссии. Для этого добавь<br>в свой ник Steam: TEST.RU</p>
          </div>
          <div class="clr-b"></div>
        </div>
      </div> <!-- End of Rules -->

        <div class="notice">
            <a href="/shop" target="_blank"><span>Работает магазин! Дешевле чем в Steam на 30-50%!</span></a>
        </div> <!-- End of Notice -->

	    </div>

    <!-- End of Header -->
        <div id="content">
            <div class="notice advantages">

        <div class="item inline-block">
            <div class="icon"><img src="http://cshot.ru/assets/images/icon_percent.png" alt=""></div>
            <h3>ДЕШЕВЛЕ ЧЕМ В STEAM НА 30-50%</h3>
            <!--  <p><a href="">Посмотреть инвентарь бота</a></p> -->
        </div>

        <div class="item inline-block">
            <div class="icon"><img src="http://cshot.ru/assets/images/icon_rocket.png" alt=""></div>
            <h3>МОМЕНТАЛЬНАЯ ОТПРАВКА ВЕЩЕЙ</h3>
            <!--  <p><a href="">Читать отзывы</a></p> -->
        </div>

        <div class="clr-b"></div>

    </div>  <!-- End of Notice -->

    <div class="store-page container">

        <h1>Лотерея предметов CS:GO</h1>
		
        <div class="list-products">
            <!-- 0 -->			
<?php
$qu = mysql_query("SELECT * FROM  `prod_list` ORDER BY `id` DESC");
while ($_e = mysql_fetch_assoc($qu))
{
	if($_e['shower']==1){continue;}
?>		
				<div class="item left">
                    <div class="image">
                        <img src="<?php echo $_e['url'];?>" alt="">
                    </div>
                    <div class="wrapper">
                        <h2><?php echo $_e['name'];?></h2>
                        <div class="chars">
                            <ul>
                                <li><span class="gray">Редкость:</span> <span class="classified"><?php echo $_e['rarity'];?></span></li>
                                <li><span class="gray">Качество:</span> <?php echo $_e['status'];?></li>
                                <li><span class="gray">Осталось мест:</span> <?php echo $_e['place_n'];?></font> из <?php echo $_e['place'];?></li>
								<li><span class="gray">Стоимость билета:</span> <?php echo $_e['price_p'];?> руб.</li>
                            </ul>
                        </div>
                        <div class="price left"><?php echo $_e['price'];?> руб.</div>
						<div class="buy right">
                                <a class="buyItem" data-item="6195" href="/spots/item?id=<?php echo $_e['id'];?>"><?php if($_e['place_n']==0){
						?>Закрыто!<?php
						}else{
						?>Купить<?php
						}
						?></a>
                            </div>
                                                <div class="clr-b"></div>
                    </div>
                </div> <!-- End of Item -->
<?php
}
?>
                <!-- 3 -->
                                    <div class="clr-b"></div>
                    <!-- 0 -->
                            
        </div> <!-- End of List Products -->
        <div class="clr-b"></div>
        <center id="paginator"><ul class="pagination"> <li class="disabled"><span>1</span></li></ul></center>
    </div>
    </div>
    <!-- End of Content -->

        </div>
    </div>
	
	
	
    <!-- modals-start -->
<div id="fairplay" class="modal-content">
        <h3>Честная игра, как это работает?</h3>
        <p>За каждый внесенный <span style="color: white">1 рубль</span> вы получаете <span style="color: white">1 билет</span>. Для удобства мы выводим цены в рублях.</p>
        <p class="quote">То есть, например, если вы внесли депозит на 100 руб, то выполучите 100 билетов</p>
        <p>В начале каждого раунда наша система берет абсолютно рандомное длинное число от 0 до 1 (например 0.83952926436439157) и шифрует его через md5 , и показывает его в зашифрованом виде в начале раунда. (если вы не знаете, что такое md5 - можете почитать <a href="https://ru.wikipedia.org/wiki/MD5" target="_blank">статью</a> на википедии)</p>
        <p>Затем, когда раунд завершился, система показывает то число, которое было шифровано вначале (проверить его вы можете на сайте <a href="http://www.md5.cz/" target="_blank">md5.cz</a>) и умножает его на банк (в билетах).</p>
        <p class="quote">Например, в конце раунда банк составил 1000 рублей, а 1000 рублей = 1000 билетов (1р = 1 билет), то нужно будет число 0.83952926436439157 умножить на банк 1000 билетов (это цифры, которые мы брали для примера) и получим число 839. То есть в раунде победит человек, у которого есть 839 билет. Следовательно, чем на большую сумму депозит вы внесете - тем больше билетов вы получите, а значит выше шанс получить выигрышный билет.</p>
        <p>Вот и всё. Принцип работы честной игры заключается в том, что мы никак не можем знать какой будет банк в конце игры, а рандомное число для умножения на банк мы даем в самом начале раунда и следовательно даже если бы мы сильно этого захотели, то никак бы не смогли сделать подставного победителя.</p>
        <div class="game-checker">
            <h3>Проверка честной игры</h3>
            <p>Число раунда * общее кол-во билетов = выигрышный билет</p>
            <form onsubmit="return false;">
                <input type="text" class="inputbox" value="" id="roundHash1" placeholder="Хэш раунда"><br>
                <input type="text" class="inputbox" value="" id="roundNumber1" placeholder="Число раунда"><br>
                <input type="text" class="inputbox" value="" id="roundPrice1" placeholder="Количество билетов в раунде"><br>
                <input type="submit" class="btn" id="checkHash" value="Проверить">
            </form>
           <center> <div id="checkResult"></div> </center>
        </div>
    </div>
	
    <div id="player-modal" class="modal-content">
        <div class="loading">Загрузка...</div>
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
                    Репутация: <span class="value">-</span> <span class="plus vote">+</span>
                </div>
                <div class="player-stats">
                    <div class="item games-played separator inline-block">
                        <span>-</span>Игр
                    </div>
                    <div class="item games-won separator inline-block">
                        <span>-</span>Побед
                    </div>
                    <div class="item winrate separator inline-block">
                        <span>-%</span>Win rate
                    </div>
                    <div class="item totalBank inline-block">
                        <span>-</span>Сумма банков (руб.)
                    </div>
                </div>
                <div class="player-stats-table">
                    <table>
                        <thead>
                        <tr>
                            <td>Игра</td>
                            <td>Шанс</td>
                            <td>Джекпот (руб.)</td>
                            <td>Статус</td>
                        </tr>
                        </thead>
                        <tbody class="games-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- End of Player Modal -->
		<div id="link" class="modal-content" style="text-align: center;">
        <p>Узнать ссылку на обмен можно <a href="http://steamcommunity.com/profiles/76561198074521068/tradeoffers/privacy#trade_offer_access_url" target="_blank">здесь</a></p>
        <p>Обязательно <a href="http://steamcommunity.com/profiles/76561198074521068/edit/settings" target="_blank">откройте инвентарь</a> в Steam для получения приза!</p>
        <br>
        <input id="settings_link" placeholder="Введите ссылку на обмен" class="inputbox" value="https://steamcommunity.com/tradeoffer/new/?partner=114255340&amp;token=I_WvidvA" type="text" style="width: 300px;" >
        <input type="button" class="save-link2 btn" value="Сохранить" style="width: 320px;">
    </div> <!-- End of Link Modal -->
		<div id="deposit" class="modal-content">
        <form action="/deposit" target="_blank">
            <input type="button" class="btn" value="Через браузер" onclick="$(this).parent().submit();  $.fancybox.close();">
        </form>
        <form action="/deposit2">
            <input type="button" class="btn" value="Через клиент" onclick="$(this).parent().submit();  $.fancybox.close();">
        </form>
    </div> <!-- End of Unitpay Modal -->
	
	<!-- 
    <div id="unitpay-modal" class="modal-content">
        <form action="https://unitpay.ru/pay/21662-a59f1">
            <input placeholder="Сумма пополнения" class="inputbox" name="sum" type="text">
            <input type="hidden" name="account" value="10576">
            <input type="hidden" name="desc" value="Пополнение счета на CSHot.ru"><br>
            <input type="button" class="btn" value="Пополнить" onclick="$(this).parent().submit();">
        </form>
    </div> End of Unitpay Modal -->
    <div id="donate-modal" class="modal-content">
    <!--
       <form method="post" action="http://cshot.ru/donate/redirect" target="_blank">
            <input placeholder="Сумма пополнения" class="inputbox" name="summ" type="text">
            <input type="hidden" name="_token" value="96gszWzOykZYGExmaJfFatOGQA10PltX1JeBcJW8">
            <input type="button" class="btn" value="Пополнить" onclick="$(this).parent().submit();">
        </form> 
        -->
       <form method="post" action="#" target="_blank">
            <!--<input type="button" class="btn" value="Пополнить баланс" onclick="$(this).parent().submit();">-->
			<input type="button" class="btn" value="Пополнить баланс" onclick="$.notify('Пополнение баланса временно недоступно!'); return false;">
        </form> 

    </div> <!-- End of Unitpay Modal -->

    <!-- modals-end -->
</body>
<script src="https://cdn.socket.io/socket.io-1.3.5.js"></script>
<script src="http://148.251.35.149/assets/js/app.js" ></script>
<script>
        function updateBalance() {
        $.post('http://148.251.35.149/getBalance', function (data) {
            $('.update_balance').text(data);
        });
    }
    function addTicket(id, btn){
        $.post('http://148.251.35.149/addTicket',{id:id}, function(data){
            updateBalance();
            return $(btn).notify(data.text, {position: 'bottom middle', className :data.type});
        });
    }
    
</script>
</html>