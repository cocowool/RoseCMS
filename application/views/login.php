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
			<div class="col-md-9 rs-post-list">
				<div class="rs-google-ad" id="google-ad">
					<?php $this->load->view('adsense'); ?>					
				</div>			
				<div class="rs-palceholder">
					&nbsp;
				</div>
			</div>
			<div class="col-md-3" id="right-column">
				<div class="rs-login-container">
					<form action="/login" method="post">
						<div class="form-group <?php if(form_error('username')) echo "has-error"; ?>">
							<label for="">用户名：</label>
							<input type="text" name="username" id="username" class="form-control" />
						</div>
						<div class="form-group <?php if(form_error('password')) echo "has-error"; ?>">
							<label for="">密码：</label>
							<input type="password" name="password" id="password" class="form-control" />
						</div>
						<button type="submit" class="btn btn-default">登陆</button>
						<div class="rs-login-tip">
							立即&nbsp;&nbsp;<a href="/register">注册</a>&nbsp;&nbsp;或使用第三方账号登陆
						</div>
						<div></div>
					</form>
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