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

<div id="History3" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">ИСТОРИЯ ПОСЛЕДНИХ ИГР</h4>
      </div>
      <div class="modal-body">
		<table cellpadding="0" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ЛОТ</th>
            <th>ПРЕДМЕТ</th>
            <th>ПОБЕДИТЕЛЬ</th>
            <th>ПОДРОБНЕЕ</th>
            </tr>
         </thead>
         <tbody>
			<?php
		$itm = mysql_query("SELECT * FROM `prod_list` WHERE `place_n`='0' ORDER BY `id` DESC LIMIT 10");
		while($it = mysql_fetch_assoc($itm)){
		$_ite = mysql_fetch_assoc(mysql_query("SELECT * FROM `rate_list` WHERE `item`='".mysql_real_escape_string(clear_string($it['id']))."'  AND `num`='".mysql_real_escape_string(clear_string($it['winer_num']))."'"));
		if(!empty($it['win'])){
		$_itr = mysql_fetch_assoc(mysql_query("SELECT * FROM `users_list` WHERE `id`='".mysql_real_escape_string(clear_string($it['win']))."'"));
		$_ite['name']=$_itr['name'];
		}
?>
        <tr>
            <th><?php echo '#'.$it['id'];?></th>
            <th><?php echo $it['name'];?></th>
            <th><?php echo $_ite['name'];?></th>
            <th><a href='<?php echo $_conf['url'].'item?id='.$it['id'];?>'>Посмотреть историю игры</a></th>
            </tr>
<?php
		}
		?></tbody>
         </table>
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