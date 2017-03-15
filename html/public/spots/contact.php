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
		<div class='right_ct'><div class='name'>Вконтакте:</div><?php echo $_conf['vk'];?></div>
		<div class='left_ct'><div class='name'>Email:</div><?php echo $_conf['email'];?></div>
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