<?php
include 'config.php';
if(!empty($_REQUEST['r'])){
$time = time()+(365*24*60*60);
setcookie("ref", $_REQUEST['r'], $time, "/");
}
$_ITEM = mysql_fetch_assoc(mysql_query("SELECT * FROM `prod_list` WHERE `id`='".mysql_real_escape_string(clear_string($_REQUEST['id']))."'"));
if(empty($_ITEM['id'])){
            header('Location: ' . $_conf['url']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_conf['name'];?> | <?php echo $_ITEM['name'];?></title>
    <meta charset="utf-8">
    <meta name="title" content="<?php echo $_ITEM['name'];?>"/>
    <meta property="og:title" content="<?php echo $_ITEM['name'];?>"/>
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<?php echo $_ITEM['url'];?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <meta name="keywords" content="<?php echo $_ITEM['keywords'];?>"/>
    <meta name="description" content="<?php echo $_ITEM['descr'];?>"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
        <div class="progress">
      <div class="busy"><i id="busy"><?php echo $_ITEM['place']-$_ITEM['place_n'];?></i>Занято</div>
      <div class="free"><i id="free"><?php echo $_ITEM['place_n'];?></i>Свободно</div>
      <div class="progress-bar" id="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($_ITEM['place']-$_ITEM['place_n'])/($_ITEM['place']/100));?>%;"> </div>
    </div>
    <div class="col-left pull-left">
      <ul class="nav nav-justified">
        <li>
          <div class="thumbnail">
            <div class="caption">
              <ul class="nav nav-stacked">
                <li>Всего мест: <font class="type"><?php echo $_ITEM['place'];?> мест</font></li>
              </ul>
              <p>Стоимость места: <span class="pull-right price_on_buy"><?php echo $_ITEM['price_p'];?> руб.</span></p>
            </div>
            <h2>ИНФОРМАЦИЯ О ПРЕДМЕТЕ</h2>
            <div class="images"><img src="<?php echo $_ITEM['url'];?>" alt="..."></div>
            <div class="caption">
              <h3><?php echo $_ITEM['name'];?></h3>
              <ul class="nav nav-stacked">
                <li>Редкость: <font class="type"><?php echo $_ITEM['rarity'];?></font></li>
                <li>Статус: <font class="from"><?php echo $_ITEM['status'];?></font></li>
              </ul>
              <p>Стоимость на ТП: <span class="pull-right price_on_tp"><?php echo $_ITEM['price'];?> Руб.</span>
              <div class="clearfix"></div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-right pull-right">
		  <?php
			  if($_ITEM['place_n']==0){
  				  if($_ITEM['game']==2){
					  $_xzk2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `rate_list` WHERE `item`='".mysql_real_escape_string(clear_string($_ITEM['id']))."' AND `num`='".mysql_real_escape_string(clear_string($_ITEM['winer_num']))."'"));	
					  $_xzk = mysql_fetch_assoc(mysql_query("SELECT * FROM `users_list` WHERE `id`='".mysql_real_escape_string(clear_string($_xzk2['user']))."'"));	
				  }else{
					  $_xzk = mysql_fetch_assoc(mysql_query("SELECT * FROM `rate_list` WHERE `item`='".mysql_real_escape_string(clear_string($_ITEM['id']))."' AND `num`='".mysql_real_escape_string(clear_string($_ITEM['winer_num']))."'"));	
				  }
				  ?>
				  <div class="win">
				  <div class='picer' style='background: url(<?php echo (($_ITEM['game']==2)?$_xzk['pic_big']:$_xzk['url']);?>);background-size: 70px 70px;'></div>
				  <div class="win_n">Предмет достался учаснику - <span><?php echo $_xzk['name'];?></span></div>
				  <?php
				  if(($_USER['steam']==$admin_steam) and ($_ITEM['game']==2)){
				  echo '<div class="inpt-group">
                     <input type="text" class="form-control" name="url" value="'.$_xzk['trade'].'">
				  </div>';
			  }
				  ?>
				  <div class="completed"></div>
				  </div>
				  <div class="random_org_block" style="margin: 20px 0;"><div class="pull-left"><button class="fair_play">ЧЕСТНАЯ ИГРА</button>ПОБЕДНОЕ МЕСТО<i class="icon_place"><?php echo $_ITEM['winer_num'];?></i></div>
                    <div class="pull-right"><img src="images/random_org.png"></div><div class="clearfix"></div></div>
		  <?php
			  }
				  ?>
      <div class="row">
        <ul class="nav nav-justified text-info">
          <li>
            <p>Вы можете занять неограниченное количество мест</p>
            <p>Вы занимаете <font><?php
			$row=mysql_fetch_row(mysql_query("SELECT count(*) FROM  `rate_list` WHERE `item`='".mysql_real_escape_string(clear_string($_ITEM['id']))."' AND `user`='".$_USER['id']."'"));
			echo $row[0];			
			?></font> мест для этого предмета</p>
          </li>
          <li>
		  <?php
			  if($_ITEM['place_n']==0){
				  ?>
            <p>Игра окончена, победитель определён, попытайте счастье в другой игре =)</p>
			  <?php
			  }else{
			  ?>
            <p>Выберите свободное место, которые хотите занять
              или можете:</p>
			  <button class="random_place" onclick="buy(0,<?php echo $_ITEM['id'];?>,<?php echo $_ITEM['price_p'];?>)">Занять случайное место</button>
			  <?php
			  }
			  ?>
          </li>
        </ul>
      </div>
        <ul class="nav nav-justified grid_place">
		<?php
		$itm = mysql_query("SELECT * FROM `rate_list` WHERE `item`='".mysql_real_escape_string(clear_string($_ITEM['id']))."'");
		while($it = mysql_fetch_assoc($itm)){
			$_i[$it['num']] = $it['user'];
			$_h[$it['num']] = $it['url'];
			$_n[$it['num']] = $it['name'];
		}
		$ks = 0;
		for($i=1;$i<=$_ITEM['place'];$i++){
			if(isset($_i[$i])){
				$_IT = mysql_fetch_assoc(mysql_query("SELECT * FROM `users_list` WHERE `id`='".mysql_real_escape_string(clear_string($_i[$i]))."'"));	
				if($_IT['id']!=$_USER['id']){
					if(empty($_IT['id'])){
						$kek = 'set';
						if(($i==$_ITEM['winer_num']) and ($_ITEM['place_n']==0)){
							$kek='winner';
							$ks = 1;
						}
						echo '<li class="'.$kek.'"  onmouseover="set_name(\''.$_n[$i].'\',this)"  onmouseout="set_name(\'\',\'\')" id="select'.$i.'"><font>'.$i.'</font><img src="'.$_h[$i].'"></li>';	
					}else{
						if($i==$_ITEM['winer_num']){
							$ks = 1;
							echo '<li class="winner" onmouseover="set_name(\''.$_IT['name'].'\',this)" onmouseout="set_name(\'\',\'\')" id="select'.$i.'"><font>'.$i.'</font><img src="'.$_IT['pic_min'].'"></li>';
						}else{
							echo '<li class="set" onmouseover="set_name(\''.$_IT['name'].'\',this)" onmouseout="set_name(\'\',\'\')" id="select'.$i.'"><font>'.$i.'</font><img src="'.$_IT['pic_min'].'"></li>';
						}
					}
				}else{
					if(empty($_IT['id'])){
						$kek = 'set';
						if(($i==$_ITEM['winer_num']) and ($_ITEM['place_n']==0)){
							$kek='winner';
							$ks = 1;
						}
						echo '<li class="'.$kek.'"  onmouseover="set_name(\''.$_n[$i].'\',this)"  onmouseout="set_name(\'\',\'\')" id="select'.$i.'"><font>'.$i.'</font><img src="'.$_h[$i].'"></li>';	
					}else{
					if($i==$_ITEM['winer_num']){
						$ks = 1;
						echo '<a href="http://steamcommunity.com/profiles/'.$_IT['steam'].'"><li class="winner" onmouseover="set_name(\''.$_USER['name'].'\',this)" onmouseout="set_name(\'\',\'\')" id="select'.$i.'"><font>'.$i.'</font><img src="'.$_IT['pic_min'].'"></li></a>';
					}else{
						echo '<a href="http://steamcommunity.com/profiles/'.$_IT['steam'].'"><li class="my" onmouseover="set_name(\''.$_USER['name'].'\',this)" onmouseout="set_name(\'\',\'\')" id="select'.$i.'"><font>'.$i.'</font><img src="'.$_IT['pic_min'].'"></li></a>';
					}
					}
				}
			}else{
				if(!empty($_USER['id'])){
					echo '<li class="offset" id="select'.$i.'" onclick="buy('.$i.','.$_ITEM['id'].','.$_ITEM['price_p'].')"><font>'.$i.'</font></li>';
				}else{
					echo '<li class="offset" id="select'.$i.'" onclick="no_reg()"><font>'.$i.'</font></li>';
				}
			}
		}
		?>
		</ul>
        <div class="text-center text_flp1">Чем больше ставок, тем больше шанс победить! Не упусти свою удачу ;)</div>
		<div class='list_rate'>
		<?php
		$its = mysql_query("SELECT * FROM `rate_list` WHERE `item`='".mysql_real_escape_string(clear_string($_ITEM['id']))."' ORDER BY `time` DESC");
		if($ks ==1){
		echo "<div class='count_rate'>".date("Y-m-d H:i:s",$_ITEM['time2'])." <span>Лот закрыт. Победитель определён.</span></div>";	
		}
		while($_is = mysql_fetch_assoc($its)){
			$_us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users_list` WHERE `id`='".mysql_real_escape_string(clear_string($_is['user']))."'"));	
			if(empty($_us['id'])){
				echo "<div class='count_rate'>".date("Y-m-d H:i:s",$_is['time'])." <span>".$_is['name']."</span> занял место #".$_is['num']."</div>";
			}else{
				echo "<div class='count_rate'>".date("Y-m-d H:i:s",$_is['time'])." <span>".$_us['name']."</span> занял место #".$_is['num']."</div>";
			}
		}
		echo "<div class='count_rate'>".date("Y-m-d H:i:s",$_ITEM['time'])." <span>Лот открыт. Все места для ставок свободны.</span></div>";
		?></div>
		<script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
  <div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,googlebookmark,google,moimir,yandex,twitter"></div>
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