<?php
$page=1;
require 'openid.php';
include 'config.php';
try 
{
    $openid = new LightOpenID($_conf['url']);
    if(!$openid->mode) 
    {
        $openid->identity = 'http://steamcommunity.com/openid/?l=english'; 
        header('Location: ' . $openid->authUrl());
    } 
    elseif($openid->mode == 'cancel') 
    {
            header('Location: ' . $_conf['url']);
    } 
    else 
    {
        if($openid->validate()) 
        {
                $id = $openid->identity;
                // identity is something like: http://steamcommunity.com/openid/id/76561197960435530
                // we only care about the unique account ID at the end of the URL.
                $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $id, $matches);
 
                $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$_conf['key']."&steamids=".$matches[1];
                $json_object= file_get_contents($url);
                $json_decoded = json_decode($json_object);
 
                foreach ($json_decoded->response->players as $player)
                {
					$id = $player->steamid;
					$name = $player->personaname;
					$a1 = $player->avatar;
					$a2 = $player->avatarmedium;
					$a3 = $player->avatarfull;
                }
				if(!empty($_USER['id'])){
                    header('Location: ' . $_conf['url']);
				}else{
					$hash = md5($id."_".$name.(rand(1,99999)/time()));
					$r1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users_list` WHERE `steam`='".mysql_real_escape_string($id)."'"));
					if(!empty($r1['id'])){
						mysql_query("UPDATE `users_list` SET `name`='".mysql_real_escape_string($name)."',`pic_min`='".mysql_real_escape_string($a1)."',`pic_norm`='".mysql_real_escape_string($a2)."',`pic_big`='".mysql_real_escape_string($a3)."',`hash`='".(md5($hash.$_conf['secret']))."' WHERE `id`='".$r1['id']."'");
						$_SESSION['uid'] = $r1['steam'];
						$_SESSION['utoken'] = $hash;
						$time = time()+(365*24*60*60);
						setcookie("uid", $r1['steam'], $time, "/");
						setcookie("utoken", $hash, $time, "/");
					}else{
						$ref=0;
						if(!empty($_COOKIE['ref'])){
						$ref=$_COOKIE['ref'];	
						}
						$r2 = mysql_query ("INSERT INTO users_list (steam,name,pic_min,pic_norm,pic_big,hash,ref,time) VALUES('". mysql_real_escape_string($id)."','". mysql_real_escape_string($name)."','". mysql_real_escape_string($a1)."','". mysql_real_escape_string($a2)."','". mysql_real_escape_string($a3)."','".(md5($hash.$_conf['secret']))."','".mysql_real_escape_string(clear_string($ref))."','".mysql_real_escape_string(clear_string(time()))."')");
						if($r2){
							if(!empty($_COOKIE['ref'])){
								mysql_query("UPDATE `users_list` SET `money`=`money`+'".$_conf['referal']."' WHERE `id`='".mysql_real_escape_string(clear_string($_COOKIE['ref']))."'");
							}
							$_SESSION['uid'] = $id;
							$_SESSION['utoken'] = $hash;
							$time = time()+(365*24*60*60);
							setcookie("uid", $id, $time, "/");
							setcookie("utoken", $hash, $time, "/");
						}
					}
					header('Location: ' . $_conf['url']);
				}
 
        } 
        else 
        {
                echo "Не удалось войти.\n";
        }
    }
} 
catch(ErrorException $e) 
{
    echo $e->getMessage();
}
?>