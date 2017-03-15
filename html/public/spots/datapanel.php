<?php
include 'config.php';
if($_SESSION['adm_key']!= $_REQUEST['sign']){
unset($_REQUEST);
}
$_SESSION['adm_key'] =  time()*rand(1,100000);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="utf-8">
	<meta http-equiv="content-language" content ="ru"/>
	<meta name="robots" content="all"/>
	<script src="js/jquery1.7.js"></script>
	<title>Панель Администратора</title>
	<style>
	body{
		background-color: #899da4;
	}
	.form{
		margin: 50px auto 0 auto;
		width: 500px;
		padding: 10px;
	    background-color: #586363;
	}
	.text{
		width: 100%;
		text-align: center;
		padding: 5px;
		font-size: 17px;
        font-weight: bold;
		color: rgb(250,250,250);
	}
	input{
		margin: 5px auto 5px auto;
		width: 240px;
		border: 1px solid rgb(100,100,100);
		padding: 2px;
		display: block;
	}
	textarea{
		margin: 5px auto 5px auto;
		width: 240px;
		min-width: 240px;
		max-width: 240px;
		height: 60px
		min-height: 60px;
		max-height: 60px;
		border: 1px solid rgb(100,100,100);
		padding: 2px;
		display: block;
	}
	.line{
		display: inline-block !important;
        margin: 0 3.5px !important;
	}
	.button{
		color: rgb(255,255,255);
		cursor: pointer;
		margin: 5px auto;
		display: block;
		background-color: #55a3ae;
    	width: 115px;
    	height: 36px;
    	line-height: 36px;
    	font-size: 14px;
  		border: none;
	    -webkit-box-shadow: 0 2px 0 #383a3a;
	    -moz-box-shadow: 0 2px 0 #383a3a;
	    box-shadow: 0 2px 0 #383a3a;
	}
	.lister{
		color: rgb(255,255,255);
		margin: 5px 0;
		padding: 5px 0;
		border-bottom: 1px solid rgb(255,255,255);
	}
	.lister span{
		font-weight: bold;
	}
	.imager{
	    float: right;
        width: 90px;
        height: 90px;
	}
	</style>
<script>
function setter(a) {
    $("#place[data-id='1']").css({'display':'none'});
    $("#place[data-id='2']").css({'display':'none'});
    $("#place[data-id='3']").css({'display':'none'});
    $("#place[data-id='4']").css({'display':'none'});
    $("#place[data-id='"+a+"']").css('display','block');
}
</script>

</head>
<body>
<div class='form'>
<?php
if($_USER['steam'] == $_conf['admin_steam']){
$row=mysql_fetch_row(mysql_query("SELECT count(*) FROM  `users_list`"));
echo "<div class='text' style='color: rgb(195, 234, 253);font-size: 20px'>Пользователей: <span style='font-size:22px'>".$row[0]."</span></div>";
if(!empty($_REQUEST['item'])){
$_item = mysql_fetch_assoc(mysql_query("SELECT * FROM `prod_list` WHERE `id`='".mysql_real_escape_string(clear_string($_REQUEST['item']))."'"));
}
if(!empty($_item['id'])){
?>
<form action='' method='post'>
<input type='text' name='tp' value='4' style='display: none'>
<input type='text' name='sign' value='<?php echo $_SESSION['adm_key'];?>' style='display: none'>
<input type='text' name='id' value='<?php echo $_item['id'];?>' style='display: none'>
<div class='text'>Стоимость на ТП</div>
<input type='text' name='price' value="<?php echo $_item['price'];?>">
<div class='text'>Цена с 1 человека</div>
<input type='text' name='price_p' value="<?php echo $_item['price_p'];?>">
<input type='text' name='place' value="<?php echo $_item['place'];?>" style='display: none'>
<div class='text'>Название товара</div>
<input type='text' name='name' value="<?php echo $_item['name'];?>">
<div class='text'>Редкость</div>
<input type='text' name='rarity' value="<?php echo $_item['rarity'];?>">
<div class='text'>Статус</div>
<input type='text' name='status' value="<?php echo $_item['status'];?>">
<div class='text'>Ссылка на картинку</div>
<input type='text' name='url' value="<?php echo $_item['url'];?>">
<div class='text'>Ключевые слова</div>
<input type='text' name='keywords' value="<?php echo $_item['keywords'];?>">
<div class='text'>Описание</div>
<textarea name='descr'><?php echo $_item['descr'];?></textarea>
<button type='submit' class='button'>Изменить</button>
</form>
<?php
}else{
if($_REQUEST['tp']==1){ 
$upd = mysql_query("UPDATE `conf_list` SET `email`='".mysql_real_escape_string(clear_string($_REQUEST['email']))."',`name`='".mysql_real_escape_string(clear_string($_REQUEST['name']))."',`url`='".mysql_real_escape_string(clear_string($_REQUEST['url']))."',`vk`='".mysql_real_escape_string(clear_string($_REQUEST['vk']))."',`vk_group`='".mysql_real_escape_string(clear_string($_REQUEST['vk_group']))."',`key`='".mysql_real_escape_string(clear_string($_REQUEST['key']))."',`secret`='".mysql_real_escape_string(clear_string($_REQUEST['secret']))."',`referal`='".mysql_real_escape_string(clear_string($_REQUEST['referal']))."'");
if($upd){
$_conf = mysql_fetch_assoc(mysql_query("SELECT * FROM `conf_list`"));
}
}else if($_REQUEST['tp']==2){
$upd = mysql_query ("INSERT INTO `prod_list` (price,price_p,place,place_n,name,url,status,rarity,descr,keywords,time,game) VALUES('". mysql_real_escape_string(clear_string($_REQUEST['price']))."','". mysql_real_escape_string(clear_string($_REQUEST['price_p']))."','". mysql_real_escape_string(clear_string($_REQUEST['place']))."','". mysql_real_escape_string(clear_string($_REQUEST['place']))."','". mysql_real_escape_string(clear_string($_REQUEST['name']))."','". mysql_real_escape_string(clear_string($_REQUEST['url']))."','". mysql_real_escape_string(clear_string($_REQUEST['status']))."','". mysql_real_escape_string(clear_string($_REQUEST['rarity']))."','". mysql_real_escape_string(clear_string($_REQUEST['descr']))."','". mysql_real_escape_string(clear_string($_REQUEST['keywords']))."','".time()."','". mysql_real_escape_string(clear_string($_REQUEST['game']))."')")or die(mysql_error());
if($upd){
echo "<div class='text'>Товар добавлен</div>";
}
}else if($_REQUEST['tp']==3){
if(!empty($_REQUEST['id'])){	
$upd = mysql_query("DELETE FROM `prod_list` WHERE `id`='".mysql_real_escape_string(clear_string($_REQUEST['id']))."' ");
if($upd){
echo "<div class='text'>Товар удалён</div>";
}
}
}else if($_REQUEST['tp']==4){
if(!empty($_REQUEST['id'])){	
$upd = mysql_query("UPDATE `prod_list` SET `keywords`='".mysql_real_escape_string(clear_string($_REQUEST['keywords']))."',`descr`='".mysql_real_escape_string(clear_string($_REQUEST['descr']))."',`price`='".mysql_real_escape_string(clear_string($_REQUEST['price']))."',`price_p`='".mysql_real_escape_string(clear_string($_REQUEST['price_p']))."',`place`='".mysql_real_escape_string(clear_string($_REQUEST['place']))."',`name`='".mysql_real_escape_string(clear_string($_REQUEST['name']))."',`rarity`='".mysql_real_escape_string(clear_string($_REQUEST['rarity']))."',`status`='".mysql_real_escape_string(clear_string($_REQUEST['status']))."',`url`='".mysql_real_escape_string(clear_string($_REQUEST['url']))."' WHERE `id`='".$_REQUEST['id']."'");
if($upd){
echo "<div class='text'>Товар изменён</div>";
}
}
}else if($_REQUEST['tp']==5){
if(!empty($_REQUEST['id'])){	
$_er = mysql_fetch_assoc(mysql_query("SELECT * FROM `prod_list` WHERE `id`='".mysql_real_escape_string(clear_string($_REQUEST['id']))."'"));
$upd = mysql_query("UPDATE `prod_list` SET `shower`='".mysql_real_escape_string(clear_string((($_er['shower']==1)?'0':'1')))."' WHERE `id`='".mysql_real_escape_string(clear_string($_REQUEST['id']))."'");
if($upd){
echo "<div class='text'>Товар изменён</div>";
}
}
}
?>
<button onclick='setter(1)' class='button line'>Настройки</button>
<button onclick='setter(2)' class='button line'>Реферал</button> 
<button onclick='setter(3)' class='button line'>Добавить вещь</button> 
<button onclick='setter(4)' class='button line'>Список вещей</button> 
<div id='place' data-id='1' >
<form action='' method='post'>
<input type='text' name='tp' value='1' style='display: none'>
<input type='text' name='sign' value='<?php echo $_SESSION['adm_key'];?>' style='display: none'>
<div class='text'>Название Сайта</div>
<input type='text' name='name' value="<?php echo $_conf['name'];?>">
<div class='text'>Ссылка на сайт</div>
<input type='text' name='url' value="<?php echo $_conf['url'];?>">
<div class='text'>Ссылка на страницу помощи/группу</div>
<input type='text' name='vk' value="<?php echo $_conf['vk'];?>">
<div class='text'>Ссылка на группу</div>
<input type='text' name='vk_group' value="<?php echo $_conf['vk_group'];?>">
<div class='text'>Email для помощи/ окончании игры</div>
<input type='text' name='email' value="<?php echo $_conf['email'];?>">
<div class='text'>Ключ Steam API</div>
<input type='text' name='key' value="<?php echo $_conf['key'];?>">
<div class='text'>Секретный ключ(для авторизации)</div>
<input type='text' name='secret' value="<?php echo $_conf['secret'];?>">
<div class='text'>Цена за реферера</div>
<input type='text' name='referal' value="<?php echo $_conf['referal'];?>">
<button type='submit' class='button'>Изменить</button>
</form>
</div>
<div id='place' data-id='2' style='display:none'>
<form action='/referal' method='get'>
<input type='text' name='tp' value='5' style='display: none'>
<div class='text'>ID реферера</div>
<input type='text' name='id' value="">
<button type='submit' class='button'>Узнать кол-во</button>
</form>
</div>
<div id='place' data-id='3' style='display:none'>
<form action='' method='post'>
<input type='text' name='tp' value='2' style='display: none'>
<input type='text' name='sign' value='<?php echo $_SESSION['adm_key'];?>' style='display: none'>
<div class='text'>Стоимость на ТП</div>
<input type='text' name='price' value="">
<div class='text'>Цена с 1 человека</div>
<input type='text' name='price_p' value="">
<div class='text'>Кол-во мест</div>
<input type='text' name='place' value="">
<div class='text'>Название товара</div>
<input type='text' name='name' value="">
<div class='text'>Редкость</div>
<input type='text' name='rarity' value="">
<div class='text'>Статус</div>
<input type='text' name='status' value="">
<div class='text'>Ссылка на картинку</div>
<input type='text' name='url' value="">
<div class='text'>Ключевые слова</div>
<input type='text' name='keywords' value="">
<div class='text'>Честная игра</div>
<input type='checkbox' name='game' value="2">
<div class='text'>Описание</div>
<textarea name='descr'></textarea>
<button type='submit' class='button'>Добавить</button>
</form>
</div>
<div id='place' data-id='4' style='display:none'>
<?php
$qu = mysql_query("SELECT * FROM  `prod_list` ORDER BY `id` DESC");
while ($_e = mysql_fetch_assoc($qu))
{
?>
<div class='lister'>
<div style='text-align: center;font-size: 15px;padding: 0 0 5px 0;'><?php echo $_e['name'];?></div>
<img src='<?php echo $_e['url'];?>' class='imager'>
Осталось мест <span><?php echo $_e['place_n'];?> \ <?php echo $_e['place'];?></span><br>
Цена с человека <span><?php echo $_e['price_p'];?></span><br>
Цена на ТП <span><?php echo $_e['price'];?></span><br>
Редкость <span><?php echo $_e['rarity'];?></span><br>
Статус <span><?php echo $_e['status'];?></span><br>
<?php echo (($_e['place_n']==0)?"<div style='text-align: center;'>Розыгрыш состоялся</div>":"");?>
<div style='text-align: center'>
<form action='' method='post' class="line" style="width: 115px">
<input type='text' name='tp' value='3' style='display: none'>
<input type='text' name='sign' value='<?php echo $_SESSION['adm_key'];?>' style='display: none'>
<input type='text' name='id' value='<?php echo $_e['id'];?>' style='display: none'>
<button type='submit' class='button'>Удалить</button>
</form>
<?php
if($_e['shower']==1){
?>
<form action='' method='post' class="line" style="width: 115px">
<input type='text' name='tp' value='5' style='display: none'>
<input type='text' name='id' value='<?php echo $_e['id'];?>' style='display: none'>
<input type='text' name='sign' value='<?php echo $_SESSION['adm_key'];?>' style='display: none'>
<button type='submit' class='button'>Показать</button>
</form>
<?php
}else{
?>
<form action='' method='post' class="line" style="width: 115px">
<input type='text' name='tp' value='5' style='display: none'>
<input type='text' name='id' value='<?php echo $_e['id'];?>' style='display: none'>
<input type='text' name='sign' value='<?php echo $_SESSION['adm_key'];?>' style='display: none'>
<button type='submit' class='button'>Скрыть</button>
</form>
<?php
}
?>
<form action='' method='post' class="line" style="width: 115px">
<input type='text' name='item' value='<?php echo $_e['id'];?>' style='display: none'>
<input type='text' name='sign' value='<?php echo $_SESSION['adm_key'];?>' style='display: none'>
<button type='submit' class='button'>Изменить</button>
</form>
</div>
</div>
<?php
}
?>
</div>
<?php
}
}else{
?>
<div class='text'>Авторизуйтесь через Steam</div>
<?php
}
?>
</div>
</body>
</html>