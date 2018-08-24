<div id="rs_register_modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">用户注册</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form action="/register" method="post">
							<div class="form-group <?php if(form_error('user_login')) echo "has-error"; ?>">
								<label class="control-label" for="user_login">用户名&nbsp;<span class="rs-register-required">*</span></label><span class="rs-register-error"><?php echo form_error('user_login'); ?></span>
								<input type="text" name="user_login" id="user_login" class="form-control" value="<?php echo set_value('user_login'); ?>" placeholder="请输入登陆用户名" />
							</div>
							<div class="form-group <?php if(form_error('user_pass')) echo "has-error"; ?>"">
								<label class="control-label" for="user_pass">密码&nbsp;<span class="rs-register-required">*</span></label><span class="rs-register-error"><?php echo form_error('user_pass'); ?></span>
								<input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="请输入登陆密码" />
							</div>
							<div class="form-group <?php if(form_error('chkPassword')) echo "has-error"; ?>"">
								<label class="control-label" for="chkPassword">确认密码&nbsp;<span class="rs-register-required">*</span></label><span class="rs-register-error"><?php echo form_error('chkPassword'); ?></span>
								<input type="password" name="chkPassword" id="chkPassword" class="form-control" placeholder="请重新输入登陆密码" />
							</div>
							<div class="form-group <?php if(form_error('user_email')) echo "has-error"; ?>"">
								<label class="control-label" for="user_email">邮箱地址&nbsp;<span class="rs-register-required">*</span></label><span class="rs-register-error"><?php echo form_error('user_email'); ?></span>
								<input type="text" name="user_email" id="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" placeholder="请输入合法的邮箱地址" />
							</div>
							<div class="form-group <?php if(form_error('user_phone')) echo "has-error"; ?>"">
								<label class="control-label" for="user_phone">手机号码&nbsp;<span class="rs-register-required">*</span></label><span class="rs-register-error"><?php echo form_error('user_phone'); ?></span>
								<input type="text" name="user_phone" id="user_phone" class="form-control" value="<?php echo set_value('user_phone'); ?>" placeholder="请留下您的手机号码，方便我们通知" />
							</div>
							<button type="submit" class="btn btn-primary">提交</button>
							<div class="rs-login-tip hide" style="display:none;">
								&nbsp;&nbsp;或使用第三方账号登陆
							</div>
							<p></p>
							<p></p>
							<div></div>
						</form>						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="rs_login_modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">用户登陆</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="">
						<div class="form-group">
							<label for="username" class="col-form-label">用户名</label><span class="rs_error_tip"></span>
							<input type="text" class="form-control" placeholder="请输入用户名" id="username" name="username">
						</div>
						<div class="form-group">
							<label for="password" class="col-form-label">密码</label><span class="rs_error_tip"></span>
							<input type="password" class="form-control" placeholder="请输入密码" id="password" name="password">
						</div>
					</form>
				</div>
				<div class="modal-footer text-left">
					<button type="button" id="btn_login" class="btn btn-primary">登陆</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">忘记密码</button>
				</div>
			</div>
		</div>
	</div>