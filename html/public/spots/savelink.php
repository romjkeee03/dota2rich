<?php
include 'config.php';
if(!empty($_USER['id']) and !empty($_REQUEST['url'])){
mysql_query("UPDATE `users_list` SET `trade`='".mysql_real_escape_string(clear_string($_REQUEST['url']))."' WHERE `id`='".$_USER['id']."'");
}
header('Location: ' . $_conf['url']);
?>