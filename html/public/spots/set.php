<?php
include 'config.php';
$fu = $fuw[rand(0,count($fuw)-1)];
$fa = $faw[rand(0,count($faw)-1)];

if(empty($_USER['id'])){
	exit(json_encode(array('error'=>'Вам нужно авторизоваться')));
}
$_ITEM = mysql_fetch_assoc(mysql_query("SELECT * FROM `prod_list` WHERE `id`='".mysql_real_escape_string(clear_string($_REQUEST['item']))."'"));
if(empty($_ITEM['id'])){
	exit(json_encode(array('error'=>'Товар не найден'.$_REQUEST['item'])));
}
if($_ITEM['place_n']==0){
	exit(json_encode(array('error'=>'Все места заняты')));
}
if($_REQUEST['num'] !=0){
	if(!is_numeric($_REQUEST['num']) or ($_REQUEST['num']<1) or ($_REQUEST['num']>$_ITEM['place'])){
		exit(json_encode(array('error'=>'Вы не выбрали место')));
	}
	$_PL = mysql_fetch_assoc(mysql_query("SELECT * FROM `rate_list` WHERE `item`='".mysql_real_escape_string(clear_string($_REQUEST['item']))."' AND `num`='".mysql_real_escape_string(clear_string($_REQUEST['num']))."'"));
	if(!empty($_PL['id'])){
		exit(json_encode(array('error'=>'Место занято')));
	}
}
if($_ITEM['price_p']>$_USER['money']){
	exit(json_encode(array('error'=>'Не достаточно средств')));	
}

$itm = mysql_query("SELECT * FROM `rate_list` WHERE `item`='".mysql_real_escape_string(clear_string($_ITEM['id']))."'");
while($it = mysql_fetch_assoc($itm)){
	$_i[$it['num']] = 1;
}
if($_REQUEST['num'] == 0){
	$num=1;
	for($i=1;$i<=$_ITEM['place'];$i++){
		if($_i[$i]!=1){
			$_nu[$num]= $i;
			$num++;
		}
	}
	$_REQUEST['num']=$_nu[rand(1,($num-1))];
	$_i[$_REQUEST['num']] = 1;
}
$money = $_USER['money']-$_ITEM['price_p'];
$upd = mysql_query("UPDATE `users_list` SET `money`='".mysql_real_escape_string(clear_string($money))."' WHERE `id`='".$_USER['id']."'");
$sa=0;
if($upd){
	$upd2 = mysql_query ("INSERT INTO rate_list (item,user,num,time) VALUES('". mysql_real_escape_string(clear_string($_ITEM['id']))."','". mysql_real_escape_string(clear_string($_USER['id']))."','". mysql_real_escape_string(clear_string($_REQUEST['num']))."','". mysql_real_escape_string(clear_string(time()))."')");
	if($upd2){
		$s = "abcdefghijklmnopqrstuvwxyz";
		$g = substr ($s, rand(0, strlen($s)) , 1).''.substr ($s, rand(0, strlen($s)) , 1);
		$min = 1;
		$_ITEM['place_n']=$_ITEM['place_n']-$min;
	if($_ITEM['game']==2){
		if($_ITEM['place_n']==0){
			$sa = rand(1,$_ITEM['place']);
			$bdink = "`winer_num`='".$sa."',";	
		}
	}else{
		if(empty($_ITEM['winer_num'])){
			if((rand(1,4)==1) or ($_ITEM['place']-$_ITEM['place_n']>5)){

				if(!empty($matches[1][0])){$fu = $matches[1][0];}
				if(!empty($matches2[1][0])){$fa = $matches2[1][0];}
				$fl=rand(2,4);
				$min= $min+$fl;
				$_ITEM['place_n']=$_ITEM['place_n']-$fl;
				for($fz=1;$fz<=$fl;$fz++){
					$num=1;
					for($i=1;$i<=$_ITEM['place'];$i++){
						if($_i[$i]!=1){
							$_nu[$num]= $i;
							$num++;
						}
					}
					$kis=$_nu[rand(1,($num-1))];
					$_i[$kis] = 1;
					$updz = mysql_query ("INSERT INTO rate_list (item,user,num,time,name,url) VALUES('". mysql_real_escape_string(clear_string($_ITEM['id']))."','0','". mysql_real_escape_string(clear_string($kis))."','". mysql_real_escape_string(clear_string((time()+rand(1,5))))."','".$fu."','".$fa."')");
				}
				$updn = mysql_query("UPDATE `prod_list` SET `winer_num`='".mysql_real_escape_string(clear_string($kis))."' WHERE `id`='".$_ITEM['id']."'");
			}
		}
	}
	
		if($_ITEM['place_n']<=0){
			$bdink = $bdink."`time2`='".time()."',";	
			$m="Игра #".$_ITEM['id']." завершена";
			 mail($_conf['email'], "Игра #".$_ITEM['id'], $m,"From: ".$_conf['name']."\r\nContent-type: text/html; charset=utf-8");
		}
		if($sa!=0){
			$_xzk = mysql_fetch_assoc(mysql_query("SELECT * FROM `rate_list` WHERE `item`='".$_ITEM['id']."' AND`num`='".mysql_real_escape_string(clear_string($sa))."'"));	
			$bdink = $bdink."`win`='".$_xzk['user']."',";	
		}
		$upd3 = mysql_query("UPDATE `prod_list` SET ".$bdink."`place_n`=`place_n`-'".$min."' WHERE `id`='".mysql_real_escape_string(clear_string($_ITEM['id']))."'");		
		exit(json_encode(array('t'=>'good')));
	}else{
		exit(json_encode(array('error'=>'Ошибка ставки')));	
	}
}else{
	exit(json_encode(array('error'=>'Ошибка оплаты')));	
}
?>