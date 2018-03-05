		<div class="rs-menu-container rs-menu-fixed row">
			<div class="col-md-9 col-sm-9 rs-menu-left">
				<div class="rs-logo">
					<a href="/"><img src="/static/default/image/saexam.png"></a>
				</div>
				<div class="rs-nav">
					<nav class="nav">
						<ul>
							<li><a href="/"><span>首页</span><span></span></a></li>
							<li><a href="/"><span>文章</span><span></span></a></li>
							<li><a href="/question"><span>真题</span><span></span></a></li>
							<li><a href="/about"><span>关于</span><span></span></a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-md-3 col-sm-0 rs-tr-menu">
				<?php
				if(empty($user_login)){
				?>
				<a href="/login">登陆</a>&nbsp;/&nbsp;<a href="/register">注册</a>
				<?php
				}else{
				?>
				<p>欢迎 <a href="#"><?php echo $user_login; ?></a> 回来</p>
				<?php	
				}
				?>
			</div>
		</div>
