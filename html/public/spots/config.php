<?php
session_start();
$page=0;
if($page!=2){
header("Content-Type: text/html; charset=utf-8");
}
$_conf['db_base'] = 'spots';//БАЗА
$_conf['db_user'] = 'root';//ПОЛЬЗОВАТЕЛЬ
$_conf['db_pass'] = 'k418kjsja2841jksad';//Пароль
$_conf['db_host'] = 'localhost'; //ХОСТ
$admin_steam = '76561198074521068';//STEAM ID


$db = mysql_connect($_conf['db_host'],$_conf['db_user'],$_conf['db_pass']);
mysql_select_db($_conf['db_base'], $db);
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $db);

$_conf = mysql_fetch_assoc(mysql_query("SELECT * FROM `conf_list`"));
$_conf['admin_steam'] = $admin_steam;

function clear_string($d){
    $s = array("'","\"");
    $r = array("","");
    $d = $d;
    $d = htmlspecialchars($d);
    $d = stripslashes($d);
    $d = trim($d);
    $d = str_replace($s, $r, $d);
    return $d;
}

if(($page!=1) and ($page!=2)){
if(!empty($_SESSION['uid']) and !empty($_SESSION['utoken'])){
	$_USER = mysql_fetch_assoc(mysql_query("SELECT * FROM `users_list` WHERE `steam`='".mysql_real_escape_string($_SESSION['uid'])."'"));
	if($_USER['id']==""){
		$_SESSION['uid'] = '';
		$_SESSION['utoken'] = '';
		SetCookie("uid","");
		SetCookie("utoken","");
	}
	if($_USER['hash'] != md5($_SESSION['utoken'].$_conf['secret'])){
		Unset($_USER);
		$_SESSION['uid'] = '';
		$_SESSION['utoken'] = '';
		SetCookie("uid","");
		SetCookie("utoken","");
	}
}else if(!empty($_COOKIE['uid']) and !empty($_COOKIE['utoken'])){
	$_SESSION['uid'] = $_COOKIE['uid'];
	$_SESSION['utoken'] = $_COOKIE['utoken'];
	$_USER = mysql_fetch_assoc(mysql_query("SELECT * FROM `users_list` WHERE `steam`='".mysql_real_escape_string($_SESSION['uid'])."'"));
	if($_USER['id']==""){
		$_SESSION['uid'] = '';
		$_SESSION['utoken'] = '';
		SetCookie("uid","");
		SetCookie("utoken","");
	}
	if($_USER['hash'] != md5($_COOKIE['utoken'].$_conf['secret'])){
		Unset($_USER);
		$_SESSION['uid'] = '';
		$_SESSION['utoken'] = '';
		SetCookie("uid","");
		SetCookie("utoken","");	
	}else{
		$_SESSION['uid'] = $_COOKIE['uid'];
		$_SESSION['utoken'] = $_COOKIE['utoken'];
	}
}else{
	$_SESSION['uid'] = '';
	$_SESSION['utoken'] = '';
	SetCookie("uid","");
	SetCookie("utoken","");	
}
}
$fuw = array('Girmest','Gracie','GrandRoyl','gufacon','HJerk28C','Houkochan','HouruSinkara','HouseholdItem','HoushiSama','Houte','Howlam','HowlClaw','Howler11','HowlingWolf55','Howlsofhatred','Hoyret','Hpdriver','Hrathgar','ImAGAl','ISTRIBITEL','johnny28','Kagasar','Kiki','Komap','Kuki','Kuku','Lixo','Loxnes','Lulu','Miss Priss','Mist @@@','Mist(er)ror','MonAmourKa','Nica','Nubie','NyanCat','p!4!','Queenie','SEZUZIF','Smotins','SubjectSpirit','Tinkerbell','БАБАЙ','Воин','Детонация','ЖАЖДУЩИЙ','Злой_волк','НИЧЬЯ','Орсанна','Суслик_переросток','aina','Bundle','capavilla','cerebripetal','chacky-hi','CUXYKEVIR','DoomThird','eartbeat','gijivaro','Gogo gums','gUyHm','Home-Lion','Houmatsu','HoundLady','---DK HN--- [Danmark]','日暮倚修竹','Shater','ffs.Hastman','JozerCry','Wiskas','TrK^_^','Zenith');
$faw = array('http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/5f/5f808e9d6c7e685a151894d45374e6822c434624.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/94/94f2dba4341017fda1c7964845a128cd42cf2809.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/44/4475c5164d81c1d5ebce2c1728e4bb36e4284385.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/b5/b51c3020ca9de297ccd0b4b2533d2b3548d6e5cc.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fea67361b6555f315b3e199c3ff9137dbc572d8a.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/6d/6db2ac365ae4ee52c350ac4e9a34fdbf013c64ce.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/aa/aa9180ac5caf4037191e74f428c7af33bb7a1115.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/d7/d77a244ab6833a4e9a8cef6baa203622b893a8c6_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/1a/1acf8af80e94f2258135a77018c09668bdc9e8a2_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/16/16a3b270a63ff9117590fe99befa6f1a94cdd752_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/4c/4c516cdb1d060cd931dc6382c58a2801359e8b11_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/ce/cef6ea6ef770965a6a269ef9f1fc8a3ed1b85288_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg',
'http://cdn.akamai.steamstatic.com/steamcommunity/public/images/avatars/2c/2c5a8ad63dbff503bb67b0ad9927e51f7fad8158_full.jpg');
?>