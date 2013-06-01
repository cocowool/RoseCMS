<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<style type="text/css">
		@import url('/static/lib/yui3.10.0/cssreset/cssreset-min.css');
		@import url('/templates/adm_default/css/public.css');
	</style>
	<title><?php echo $sys_title; ?></title>
</head>
<body>
<div id="doc3">
	<div id="hd" class="sys_top">
		<h3 class="logo"><?php echo $sys_title; ?></h3>
		<div id='topInfo' class='rightDiv'>
			欢迎：<span><?php echo $username; ?></span>
			当前日期：<span><?php echo $nowtime; ?></span>
		</div>
		<div>
			<ul class="nav_menu">
				<li><a href="<?php echo base_url(); ?>manage" target="_parent" class="on">首页</a></li>
				<li><a href="<?php echo base_url(); ?>" target="_blank">访问网站</a></li>
				<li style="display:none;"><a href="javascript:alert('Coming Soon');" target="panelFrm">帐号</a></li>
				<li><a href="<?php echo base_url(); ?>manage/auth/logout" target="_parent">退出系统</a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>