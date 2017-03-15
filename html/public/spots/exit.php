<?php
$page=1;
include 'config.php';
$_SESSION['uid'] = '';
$_SESSION['utoken'] = '';
SetCookie("uid","");
SetCookie("utoken","");
header('Location: ' . $_conf['url']);
?>