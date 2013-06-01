<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<style type="text/css">
		@import url('/static/lib/yui3.10.0/cssreset/cssreset-min.css');
		@import url('/templates/adm_default/css/public.css');
	</style>
</head>
<body>
<div id="doc3">
	<div id="bd" class="sys_left">
		<ul class="left_menu">
			<li class="first"><a href="javascript:void(0);" target="panelFrm">意向会员管理</a></li>
			<li><a href="<?php echo base_url('manage/user/home'); ?>" target="panelFrm">意向会员列表</a></li>
			<li><a href="<?php echo base_url('manage/user/add'); ?>" target="panelFrm">添加新会员</a></li>
		</ul>
		<ul class="left_menu">
			<li class="first"><a href="javascript:void(0);" target="panelFrm">经销商管理</a></li>
			<li><a href="<?php echo base_url('manage/dealer/home'); ?>" target="panelFrm">经销商列表</a></li>
			<li><a href="<?php echo base_url('manage/dealer/add'); ?>" target="panelFrm">添加经销商</a></li>
		</ul>
		<ul class="left_menu">
			<li class="first"><a href="javascript:void(0);" target="panelFrm">系统功能</a></li>
			<li><a href="<?php echo base_url('manage/sys/version'); ?>" target="panelFrm">更新记录</a></li>
			<li><a href="<?php echo base_url('manage/auth/logout'); ?>" target="_parent">退出系统</a></li>
		</ul>
	</div>
</div>
</body>
</html>