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
			<li class="first"><a href="javascript:void(0);" target="panelFrm">文章管理</a></li>
			<li><a href="<?php echo base_url($this->config->item('adm_segment') . '/user/home'); ?>" target="panelFrm">栏目管理</a></li>
			<li><a href="<?php echo base_url($this->config->item('adm_segment') . '/user/add'); ?>" target="panelFrm">文章列表</a></li>
		</ul>
		<ul class="left_menu">
			<li class="first"><a href="javascript:void(0);" target="panelFrm">会员管理</a></li>
			<li><a href="<?php echo base_url($this->config->item('adm_segment') . '/dealer/home'); ?>" target="panelFrm">会员列表</a></li>
			<li><a href="<?php echo base_url($this->config->item('adm_segment') . '/dealer/add'); ?>" target="panelFrm"></a></li>
		</ul>
		<ul class="left_menu">
			<li class="first"><a href="javascript:void(0);" target="panelFrm">二维码管理</a></li>
			<li><a href="<?php echo base_url($this->config->item('adm_segment') . '/dealer/home'); ?>" target="panelFrm">二维码列表</a></li>
			<li><a href="<?php echo base_url($this->config->item('adm_segment') . '/dealer/add'); ?>" target="panelFrm">生成新的二维码</a></li>
		</ul>
		<ul class="left_menu">
			<li class="first"><a href="javascript:void(0);" target="panelFrm">系统功能</a></li>
			<li><a href="<?php echo base_url($this->config->item('adm_segment') . '/sys/version'); ?>" target="panelFrm">更新记录</a></li>
			<li><a href="<?php echo base_url($this->config->item('adm_segment') . '/auth/logout'); ?>" target="_parent">退出系统</a></li>
		</ul>
	</div>
</div>
</body>
</html>