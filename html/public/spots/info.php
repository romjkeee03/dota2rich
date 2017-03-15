
	<?php
	if(!empty($_USER['id'])){
	?>
	<script>
	var _url = '<?php echo $_conf['url'];?>';
	var money = <?php echo $_USER['money'];?>;
	var user_id = <?php echo $_USER['id'];?>;
	</script>
    <section id="user_info">
        <div class="container">
            <div class="pull-left">
                <div class="media"> <a class="pull-left" target="_blank" href="http://steamcommunity.com/profiles/<?php echo $_USER['steam'];?>"> <img class="media-object" src="<?php echo $_USER['pic_big'];?>" alt="..." width="79px" height="79px"> </a>
                    <div class="media-body">
                        <ul class="nav nav-stacked pull-left">
                            <li>Ник:<a href=""><?php echo $_USER['name'];?></a></li>
                            <li>На счету: <b id="balance"><?php echo $_USER['money'];?></b> р.</li>
                        </ul>
                        <form action="<?php echo $_conf['url'];?>exit" method="get">
                        <button class="btn_exit pull-right">Выйти</button>
                        </form>
                        <div class="clearfix"></div>
                        <div class="input-group">
                            <input type="text" placeholder="Сумма пополнения" id="amount" class="form-control">
                            <span class="input-group-btn">
                            <button class="btn btn-default" onclick='buy_money()'>пополнить<i class="glyphicon glyphicon-play"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <div class="media">
                    <div class="media-body">
                        <label>Ссылка на трейд:</label>
                         <a >
                        <button class="btn_buyers" onclick='shows("History")'>История Ваших ставок</button></a>
                         <a >
                        <button class="btn_history" onclick='shows("History2")'>История Ваших побед</button></a>
                        </form>
                        <div class="clearfix"></div>
                        <a href="http://steamcommunity.com/id/me/tradeoffers/privacy#trade_offer_access_url" target="_blank"><i class="glyphicon glyphicon-question-sign"></i></a>
                        <form action="savelink" method="post">
                        <div class="input-group">
                            <input type="text" placeholder="Вставьте ссылку на обмен" class="form-control" name="url" value="<?php echo $_USER['trade'];?>">
              <span class="input-group-btn">
              <button class="btn btn-default" style="padding: 3px 5px;" type="submit"><i class="glyphicon glyphicon-ok"></i></button>
              </span> </div></form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
     <a href='<?php echo $_conf['vk_group'];?>' target='_blank' class='vk_group'><section id="alert-msg">
        <div class="text-center">
            <p>Наша группа в Вконтакте, не пропусти розыгрыши!!!</p>
        </div>
    </section></a>
	<?php
	}else{
	?>
	<script>
	var _url = '<?php echo $_conf['url'];?>';
	</script>
     <section id="alert-msg">
        <div class="text-center">
            <p>Для того что бы учавствовать в розыгрыше предметов пройдите процедуру авторизации в Steam</p>
        </div>
    </section>
     <a href='<?php echo $_conf['vk_group'];?>' target='_blank'class='vk_group'><section id="alert-msg">
        <div class="text-center">
            <p>Наша группа в Вконтакте, не пропусти розыгрыши!!!</p>
        </div>
    </section></a>
	<?php
	}
	?>
