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
<div id="FairPlay" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">ЧЕСТНАЯ ИГРА - КАК ЭТО РАБОТАЕТ?</h4>
      </div>
      <div class="modal-body">
        <p>Технология «честной игры» на нашем сайте работает таким образом, что победителя выбирает не наша система, а сайт <a href="Random.org">Random.org</a></p>
        <p><a href="Random.org">Random.org</a> – самый популярный и авторитетный генератор случайных чисел в мире.</p>

<p>Как только набирается необходимое количество пользователей на одном предмете - мы посылаем запрос на random.org с числом, которое является количеством всех пользователей, после чего random.org возвращает нашей системе случайное число, под которым и выбирается обладатель предмета.</p>

<p>После завершения, под выбраным победителем появится такая панель,
в которой, нажав на кнопку «проверить» вас перебросит на сайт random.org, где вы сможете все проверить сами.</p>
        <div class="random_org_block"><div class="pull-left"><button class="fair_play">ЧЕСТНАЯ ИГРА</button>ПОБЕДНОЕ МЕСТО<i class="icon_place">69</i></div>
        <div class="pull-right"><button class="check_random">ПРОВЕРИТЬ</button><img src="images/random_org.png"></div><div class="clearfix"></div></div>
      </div>
      <div class="modal-footer">

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