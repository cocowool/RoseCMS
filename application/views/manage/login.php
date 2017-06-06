<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name='robots' content='noindex,follow' />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="/static/admin/css/login.css" type="text/css" media="all" />
	</head>
	<body class="login rs-core-ui">
		<div id="login">
			<h1>系统分析之家</h1>
			<form name="loginform" id="loginform" action="/manage/login" method="post">
				<p>
					<?php
						echo validation_errors();
					?>
				</p>
				<p>
					<label for="user_login">用户名</label><br />
					<input type="text" name="user_login" id="user-login" class="input" value="<?php echo set_value('user_login'); ?>" size="20">
				</p>
				<p>
					<label for="user_pass">密码</label><br />
					<input type="password" name="user_pass" id="user_pass" class="input" size="20">
				</p>
				<p class="rememberme">
					<label for="rememberme"><input type="checkbox" name="rememberme" id="rememberme" value="forever">记住我</label>
				</p>
				<p class="submit">
					<input type="submit" name="rs-submit" id="rs-submit" class="button button-primary button-large" value="登陆">
					<input type="hidden" name="redirect_to" id="redirect_to" value="">
					<input type="hidden" name="testcookie" value="1">
				</p>
			</form>
		</div>
		<div class="clear"></div>
	</body>
</html>