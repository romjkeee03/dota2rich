					<div class="col-md-3"><a href="<?php echo $_conf['url'];?>" class="logo"><span>TEST<font>.</font><font>RU</font></span><span>bets is <font>start</font> here</span></a></div>
            <div class="col-md-9">
			<div class="pull-right">
				<?php
				if(!empty($_USER['id'])){
				?>
                    <form action="<?php echo $_conf['url'];?>exit" method="get">
                    <button class="sign_in">Выйти из  Steam</button>
                    </form>	
				<?php
				}else{
				?>
                    <form action="<?php echo $_conf['url'];?>login" method="get">
                    <button class="sign_in">Войти в Steam</button>
                    </form>	
				<?php
				}
				?>
                </div>
                <div class="pull-right">
                    <ul id="horizontal_menu" class="nav nav-pills">
                        <li><a href="<?php echo $_conf['url'];?>"><i class="home"></i>ГЛАВНАЯ</a></li>
                        <li><a href="<?php echo $_conf['url'];?>history"><i class="history"></i>ИСТОРИЯ</a></li>
                        <li><a href="<?php echo $_conf['url'];?>fairplay"><i class="true_game"></i>ЧЕСТНАЯ ИГРА</a></li>
                        <li><a href="<?php echo $_conf['url'];?>modalsupport"><i class="support"></i>ПОДДЕРЖКА</a></li>
                    </ul>
                </div>
                </div>