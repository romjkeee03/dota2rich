<?php
include 'config.php';
if(!empty($_REQUEST['r'])){
$time = time()+(365*24*60*60);
setcookie("ref", $_REQUEST['r'], $time, "/");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_conf['name'];?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
<script type="text/javascript" src="https://www.nextpay.ru/buy/script/jquery.min.js"></script>
<script type="text/javascript" src="https://www.nextpay.ru/buy/int.js?v=3"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
    <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <div class="container">
        <div class="row">
			<?php
			include('button.php');
			?>
        </div>
    </div>
	<?php
	include('info.php');
	?>
</header>
<section id="content">
    <div class="container">
<div id="ModalSupport" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="myModalLabel">ПОДДЕРЖКА</h4>
            </div>
            <div class="modal-body">
                <div class="block-qustion">
                    <p><font>Вопрос:</font> Я победил, а мне не пришел предмет!</p>
                    <p><font>Ответ:</font> Отправка предметов может занимать до 30 минут (в зависимости от загруженности ботов), а также обратите внимание на то, что в настройках приватности вашего аккаунта Steam ваш инвентарь должен быть открыт: <a href="http://steamcommunity.com/id/me/edit/settings/">http://steamcommunity.com/id/me/edit/settings/</a>, а также убедитесь, что у вас нет никаких ограничений на обмен в Steam. Если на вашей стороне все в порядке, тогда напишите нашему саппорту с описанием проблемы, вашим ником на сайте и номером лота.</p></div>

                <div class="block-qustion"><p><font>Вопрос:</font> Как часто будут появляться новые предметы?</p>
                    <p><font>Ответ:</font> Сайт автоматически обновляется по мере появления необходимых предметов у нашего бота.</p></div>
            </div>
            <div class="modal-footer text-center">
                <p>Если вы здесь не нашли ответа на ваш вопрос, тогда вы можете задать его<br>
                    нашему саппорту через эту форму отправки сообщений в VK.</p>
                <button type="button" class="btn btn-default btn-send"><a style='color: rgb(255,255,255)' target='_blank' href='<?php echo $_conf['vk'];?>'>ОТПРАВИТЬ СООБЩЕНИЕ САППОРТУ В VK</a></button>
            </div>
        </div>
    </div>
</div>
	</div>
</section>
<?php
include 'blocks.php';
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery1.7.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>