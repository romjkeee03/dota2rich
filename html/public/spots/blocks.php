<div class='down_menu'><a href='<?php echo $_conf['url'];?>contact'>Контакты</a></div>
<div class="modal" id="History" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick='shows("History")'>&times;</button>
        <h4 class="modal-title text-center" id="myModalLabel">ИСТОРИЯ ВАШИХ СТАВОК</h4>
      </div>
      <div class="modal-body">
		<table cellpadding="0" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ЛОТ</th>
            <th>ВРЕМЯ</th>
            <th>НАЗВАНИЕ</th>
            <th>ПОДРОБНЕЕ</th>
            </tr>
         </thead>
         <tbody>
			<?php
		$itm = mysql_query("SELECT * FROM `rate_list` WHERE `user`='".$_USER['id']."' ORDER BY `time` DESC");
$fw=0;
		while($it = mysql_fetch_assoc($itm)){
			$_ite = mysql_fetch_assoc(mysql_query("SELECT * FROM `prod_list` WHERE `id`='".mysql_real_escape_string(clear_string($it['item']))."'"));
			if(empty($kd[$it['item']]) and(!empty($_ite['id']))){
?>
        <tr>
            <th><?php echo '#'.$it['item'];?></th>
            <th><?php echo date("Y-m-d H:i:s",$it['time']);?></th>
            <th><?php echo $_ite['name'];?></th>
            <th><a href='<?php echo $_conf['url'].'item?id='.$it['item'];?>'>Посмотреть историю игры</a></th>
            </tr>
<?php
$kd[$it['item']]=1;
$fw++;
			}
	if($fw==10){break;}		
		}
		?></tbody>
         </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<div class="modal" id="History2" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick='shows("History2")'>&times;</button>
        <h4 class="modal-title text-center" id="myModalLabel">ИСТОРИЯ ВАШИХ ПОБЕД</h4>
      </div>
      <div class="modal-body">
		<table cellpadding="0" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ЛОТ</th>
            <th>ВРЕМЯ</th>
            <th>НАЗВАНИЕ</th>
            <th>ПОДРОБНЕЕ</th>
            </tr>
         </thead>
         <tbody>
		 			<?php
		$itm = mysql_query("SELECT * FROM `prod_list` WHERE `place_n`='0' AND `win`='".$_USER['id']."' ORDER BY `id` DESC LIMIT 10");
		while($it = mysql_fetch_assoc($itm)){

		?>
        <tr>
            <th><?php echo '#'.$it['id'];?></th>
            <th><?php echo $it['name'];?></th>
            <th><?php echo $_USER['name'];?></th>
            <th><a href='<?php echo $_conf['url'].'item?id='.$it['id'];?>'>Посмотреть историю игры</a></th>
            </tr>
		<?php
		}
		?>
		 </tbody>
         </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>