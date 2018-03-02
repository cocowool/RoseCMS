<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>软考资料站</title>
	<meta name="keyword" content="软考，系统分析师，系统架构师">
	<meta name="description" content="系统分析师资料站">
	<link href="/static/lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' id='twentyseventeen-style-css'  href='/static/css/main.css' type='text/css' media='all' />
	<script type="text/javascript" src="/static/lib/vue-2.3.0/vue.js"></script>
	<script type="text/javascript" src="/static/lib/jquery/jquery-3.2.1.min.js"></script>
</head>
<body class="">
	<div class="container rs-top-menu">
		<?php
			$this->load->view('menu');
		?>
	</div>
	<div class="rs-body container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="rs-register-form col-md-6">
						<form action="/register" method="post">
							<h3>用户注册</h3>
							<div class="form-group <?php if(form_error('user_login')) echo "has-error"; ?>">
								<label for="user_login">用户名&nbsp;<span class="rs-register-required">*</span></label><span><?php echo form_error('user_login'); ?></span>
								<input type="text" name="user_login" id="user_login" class="form-control" value="<?php echo set_value('user_login'); ?>" placeholder="请输入登陆用户名" />
							</div>
							<div class="form-group">
								<label for="user_pass">密码&nbsp;<span class="rs-register-required">*</span></label>
								<input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="请输入登陆密码" />
							</div>
							<div class="form-group">
								<label for="chkPassword">确认密码&nbsp;<span class="rs-register-required">*</span></label>
								<input type="password" name="chkPassword" id="chkPassword" class="form-control" placeholder="请重新输入登陆密码" />
							</div>
							<div class="form-group">
								<label for="user_email">邮箱地址&nbsp;<span class="rs-register-required">*</span></label>
								<input type="text" name="user_email" id="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" placeholder="请输入合法的邮箱地址" />
							</div>
							<div class="form-group">
								<label for="user_phone">手机号码&nbsp;<span class="rs-register-required">*</span></label>
								<input type="text" name="user_phone" id="user_phone" class="form-control" value="<?php echo set_value('user_phone'); ?>" placeholder="请留下您的手机号码，方便我们通知" />
							</div>
							<button type="submit" class="btn btn-default">提交</button>
							<div class="rs-login-tip">
								立即&nbsp;&nbsp;<a href="/register">注册</a>&nbsp;&nbsp;或使用第三方账号登陆
							</div>
							<p></p>
							<p></p>
							<div></div>
						</form>
					</div>
					<div class="col-md-3">
						
					</div>
					
				</div>
			</div>
			<div class="col-md-3" id="right-column">
				<div class="rs-google-ad" id="google-ad">
					<?php $this->load->view('adsense'); ?>					
				</div>			
				<div class="rs-sidebox" id="date_counter">
					<div class="rs-date-counter">
						<p>距离2018年软考还有<span id="dateCounter">{{ dayCount }}</span>天</p>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="rs-footer">
	<?php
		$this->load->view('footer');
	?>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		console.log("Document Ready");
	});

	var d = new Date();
	var se = new Date('2018-05-26');
	var ddCount = parseInt( (Math.abs(se - d))/1000/60/60/24 ); 

	var vm = new Vue({
		el:"#dateCounter",
		beforeCreate : function(){
			console.log("Before Vue is created");
			// console.log(d);
			// console.log(se);
		},
		mounted : function(){
			console.log("Vue is ready!");
		},
		data : {
			dayCount : ddCount
		}
	});	

	//vm.$mount('#date_counter')

	// var google_ad = new Vue({
	// 	el:"#date_counter",
	// 	data(){
	// 		return {
	// 			scroll:''
	// 		}
	// 	},
	// 	methods: {
	// 		google() {
	// 			this.scroll = document.body.scrollTop;
	// 			console.log(this.scroll);
	// 		},

	// 		mounted() {
	// 			console.log("Event Listener");
	// 			window.addEventListener('scroll', this.google)
	// 		}
	// 	}
	// });

	// var app = new Vue({
	// 	el:"#date_counter",
	// 	data:{
	// 		message:"距离下半年软考还有"
	// 	}
	// });
</script>
</html>