<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title><?php echo $this->config->item('sys_title'); ?></title>
	<link rel='stylesheet' id='login-css'  href='<?php echo $this->config->item('adm_template') ?>/css/login.css' type='text/css' media='all' />
	<style type="text/css">
		h1 a { background:none; text-indent:0; text-decoration:none; text-align:center; line-height:67px; color:#000; }
	</style>
	<meta name='robots' content='noindex,nofollow' />
  </head>
  <body class="login">
	<div id="login">
		<h1>
			<a href="http://www.heep.cn/new/transys.php" title=""><?php echo $this->config->item('sys_title'); ?></a>
		</h1>
	<form name="loginform" id="loginform" action="<?php echo base_url( $this->config->item('adm_segment') . '/auth/login'); ?>" method="post">
	<p>
		<label>用户名<br />
		<input type="text" name="username" id="username" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<label>密码<br />
		<input type="password" name="password" id="password" class="input" value="" size="20" tabindex="20" /></label>
	</p>
	<p class="forgetmenot" style="display:none;"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> 记住我的登录信息</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="登录" tabindex="100" />
	</p>
</form>
<p id="nav" style="display:none;">
<a href="http://xsite.sinaapp.com/wp-login.php?action=lostpassword" title="找回密码">忘记密码？</a>
</p>
	</div>
</body>
</html>