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
				<li><a class="menu-top" href="/<?php echo $this->config->item('adm_segment'); ?>/main">控制面板</a></li>
				<li><a class="menu-top" href="/<?php echo $this->config->item('adm_segment'); ?>/main">首页</a></li>
				<li><a class="menu-top" href="/<?php echo $this->config->item('adm_segment'); ?>/article">文章</a></li>
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
			<div id="rc-article">
				<div>
					<h2>栏目管理</h2>
				</div>
				<div>
					<p>
						<ul>
							<li><a href="/<?php echo $this->config->item('adm_segment'); ?>/category/add">新增</a></li>
							<li><a href="#">删除</a></li>
						</ul>
					</p>
				</div>
			</div>
			<div id="rc-placeholder">
				
			</div>
		</div>
	</div>
</body>
</html>