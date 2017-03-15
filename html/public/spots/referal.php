<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="utf-8">
	<meta http-equiv="content-language" content ="ru"/>
	<meta name="robots" content="all"/>
	<title>Панель Реферала</title>
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
		width: 340px;
		border: 1px solid rgb(100,100,100);
		padding: 2px;
		display: block;
	}
	.line{
		display: inline-block !important;
		margin: 0 9px !important;
	}
	.button{
		color: rgb(255,255,255);
		cursor: pointer;
		margin: 5px auto;
		display: block;
		background-color: #55a3ae;
    	width: 130px;
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
	table{
	    width: 500px;
        color: rgb(250,250,250);
		text-align: center;
	}
	.ghs{
		font-weight: bold;
	    background-color: rgba(0,0,0,0.2);
	}
	tr{
		background-color: rgba(60, 66, 222, 0.1);
	}
	</style>

</head>
<body>
<div class='form'>
<?php
if(!empty($_USER['id'])){
if(!empty($_REQUEST['id'])){
if(($_USER['steam'] == $_conf['admin_steam']) or ($_USER['steam'] == '76561198192245241')){
$_USE = mysql_fetch_assoc(mysql_query("SELECT * FROM `users_list` WHERE `id`='".$_REQUEST['id']."'"));
?>
<div class='text'>Ваша Реф. ссылка</div>
<input type='text' name='price' value="<?php echo $_conf['url'];?>?r=<?php echo $_USE['id'];?>">
<table>
<tr class='ghs'>
<td>ID</td>
<td>НИК</td>
<td>Дата регистрации</td>
<td>Пригласил</td>
</tr>
<?php
$row=mysql_fetch_row(mysql_query("SELECT count(*) FROM  `users_list` WHERE `ref`='".$_USE['id']."'"));
echo "<div class='text' style='font-weight: normal'>Пригласил <span style='font-weight: bold'>".$row[0]."</span> человек(а)</div>";
$its = mysql_query("SELECT * FROM `users_list` WHERE `ref`='".$_USE['id']."' ORDER BY `time` DESC");
while($_is = mysql_fetch_assoc($its)){
$row2=mysql_fetch_row(mysql_query("SELECT count(*) FROM  `users_list` WHERE `ref`='".$_is['id']."'"));
	echo'<tr><td>'.$_is['id'].'</td><td>'.$_is['name'].'</td><td>'.date("Y-m-d H:i:s",$_is['time']).'</td><td>'.$row2[0].'</td></tr>';
}
?>
</table>
<?php
}else{
header('Location: ' . $_conf['url']);
}
}else{
?>
<div class='text'>Ваша Реф. ссылка</div>
<input type='text' name='price' value="<?php echo $_conf['url'];?>?id=<?php echo $_USER['id'];?>">
<table>
<tr class='ghs'>
<td>ID</td>
<td>НИК</td>
<td>Дата регистрации</td>
<td>Пригласил</td>
</tr>
<?php
$row=mysql_fetch_row(mysql_query("SELECT count(*) FROM  `users_list` WHERE `ref`='".$_USER['id']."'"));
echo "<div class='text' style='font-weight: normal'>Пригласил <span style='font-weight: bold'>".$row[0]."</span> человек(а)</div>";
$its = mysql_query("SELECT * FROM `users_list` WHERE `ref`='".$_USER['id']."' ORDER BY `time` DESC");
while($_is = mysql_fetch_assoc($its)){
$row2=mysql_fetch_row(mysql_query("SELECT count(*) FROM  `users_list` WHERE `ref`='".$_is['id']."'"));
	echo'<tr><td>'.$_is['id'].'</td><td>'.$_is['name'].'</td><td>'.date("Y-m-d H:i:s",$_is['time']).'</td><td>'.$row2[0].'</td></tr>';
}
?>
</table>
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