<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<title><?php echo $this->config->item('adm_sys_title'); ?></title>
	<link rel="stylesheet" href="<?php echo $this->config->item('adm_template') . '/css/main.css'; ?>">
</head>
<body class="rc-admin">
	<div id="rc-wrap">
		<div id="rc-adm-menu-wrap">
			<ul id="rc-adm-menu">
				<li><a class="menu-top" href="#">控制面板</a></li>
				<li><a class="menu-top" href="#">首页</a></li>
				<li><a class="menu-top" href="#">文章</a></li>
				<li><a class="menu-top" href="#">媒体</a></li>
				<li><a class="menu-top" href="#">用户</a></li>
				<li><a class="menu-top" href="">二维码</a></li>
			</ul>
		</div>
		<div id="rc-content">
			<div id="rc-head">
				<h1 id="rc-site-title"><a href="#"><?php echo $this->config->item('adm_sys_title'); ?></a></h1>
				<div id="rc-head-info">
					<div id="rc-userinfo">
						您好，<?php echo $this->session->userdata($this->config->item('adm_sess_username')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>