	<nav id="rs-nav" class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">
		<a href="/" class="navbar-brand text-light"><img src="/static/default/image/sa_white.png" width="30" height="30">&nbsp;&nbsp;软考资料</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#rs-nav-menu" aria-controls="rs-nav-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="rs-nav-menu">
			<ul class="navbar-nav">
				<li class="nav-item active"><a href="/" class="nav-link">文章</a></li>
				<li class="nav-item"><a href="/question.html" class="nav-link">真题</a></li>
				<li class="nav-item"><a href="/about.html" class="nav-link">关于</a></li>
			</ul>
		</div>

		<div class="form-inline my-2 my-lg-0" id="rs-tr-container">
		<?php
			if( $this->session->userdata('rs_user_login') ){
				echo '<div class="text-light">' . $this->session->userdata('rs_user_nicename') . ' 欢迎回来，<a class="text-light" href="/logout.html">退出</a></div>';
			}else{
		?>
			<a href="/login.html" data-toggle="modal" data-target="#rs_login_modal" class="btn btn-sm btn-link collapse navbar-collapse text-light">登录</a>
			<a href="/register.html" data-toggle="modal" data-target="#rs_register_modal"  class="btn btn-sm btn-link collapse navbar-collapse text-light">注册</a>
		<?php
			}
		?>
		</div>
	</nav>
