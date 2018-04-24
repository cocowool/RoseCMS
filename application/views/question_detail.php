<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/static/lib/bootstrap-4.1.0/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="/static/lib/bootstrap-4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/source/main.css">
	<title>软考资料站</title>
	<meta name="keyword" content="软考，系统分析师，系统架构师">
	<meta name="description" content="软考资料">
</head>
<body>
	<nav id="rs-nav" class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">
		<a href="/" class="navbar-brand text-light"><img src="/static/default/image/sa_white.png" width="30" height="30">&nbsp;&nbsp;软考资料</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#rs-nav-menu" aria-controls="rs-nav-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="rs-nav-menu">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="/" class="nav-link">文章</a></li>
				<li class="nav-item active"><a href="/question.html" class="nav-link">真题</a></li>
				<li class="nav-item"><a href="／about.html" class="nav-link">关于</a></li>
			</ul>
		</div>

		<div class="form-inline my-2 my-lg-0">
			<a href="/login.html" class="btn btn-sm btn-link collapse navbar-collapse text-light">登录</a>
			<a href="/register.html" class="btn btn-sm btn-link collapse navbar-collapse text-light">注册</a>
		</div>
	</nav>
	<div id="rs-content" class="container">
		<div class="row">
			<div class="col-md-8">
				<?php 
				if( empty($question) ){

				}else{
				?>
				<div id="rs-breadcrum">
					<a href="/" class="mr-1">首页</a>&gt;
					<a href="/question.html" class="text-muted mr-1">真题</a>&gt;
					<a href="#"><?php echo $question['q_paper']; ?></a>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		
	</div>	
</body>

<body class="">
	<div class="rs-body container">
		<div class="row">
			<div class="col-md-8 rs-post-list">
			<?php
			if( empty($question) ){
				echo "<p>获取真题内容失败！</p>";
			}else{
				
			?>
				<div class="rs-q-detail">
					<div class="rs-q-title">
						<div><b>题目</b></div>
						<div class="rs-q-title-content">
							<?php echo $question['q_title']; ?>
						</div>					
					</div>
					<div>
					<form action="#">
					<?php
					if($question['q_type'] == "选择题"){
					?>
						<div><b>选项</b></div>
						<div class="rs-q-option form-group">
							<input type="radio" name="a" value=""> <label for="a">A</label> <?php echo $question['q_option_1']; ?></div>
						<div class="rs-q-option form-group">
							<input type="radio" name="a" value=""> <label for="a">B</label> <?php echo $question['q_option_2']; ?></div>
						<div class="rs-q-option form-group">
							<input type="radio" name="a" value=""> <label for="a">C</label> <?php echo $question['q_option_3']; ?></div>
						<div class="rs-q-option form-group">
							<input type="radio" name="a" value=""> <label for="a">D</label> <?php echo $question['q_option_4']; ?></div>
					<?php
					}else{
					?>
						<div><b>问题</b></div>
						<div><?php echo htmlspecialchars_decode($question['q_desc']); ?></div>
					<?php
					}
					?>
						<div class="rs-q-operation form-group">
							<button type="submit" class="btn btn-default">提交 并查看答案解析</button>
							<button type="button" class="btn btn-warning">错误反馈</button>
						</div>
					</form>	
					</div>

					<div style="min-height:110px; height:110px; display:block;">
						
					</div>
				</div>
			<?php
			}
			?>
			</div>
			<div class="col-md-4" id="right-column">
				<div class="row">
					<div class="col-md-4">
						<div id="qrcode">
							
						</div>						
					</div>
					<div class="col-md-8" style="color:#88b5e5; line-height: 1.2em;">
						<h3>扫描二维码<br />在手机中做题<br />随时随地尽在掌握</h3>
					</div>
				</div>
				<p></p>
				<div class="rs-google-ad" id="google-ad">
					<?php $this->load->view('adsense'); ?>					
				</div>
				<p></p>
				<p>&nbsp;</p>
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
		$('#qrcode').qrcode({
			"render": "canvas",
			"text"	: "<?php echo current_url() ?>",
			"minVersion" : 1,
			"maxVersion": 40,
			"left": 0,
			"top": 0,
			"size": 100,
			"fill": '#000',
			"mode": 0
		});
		//$('#qrcode').qrcode("this plugin is great");

		console.log("Document Ready");
	});

	// var d = new Date();
	// var se = new Date('2018-05-26');
	// var ddCount = parseInt( (Math.abs(se - d))/1000/60/60/24 ); 

	// var vm = new Vue({
	// 	el:"#dateCounter",
	// 	beforeCreate : function(){
	// 		console.log("Before Vue is created");
	// 		// console.log(d);
	// 		// console.log(se);
	// 	},
	// 	mounted : function(){
	// 		console.log("Vue is ready!");
	// 	},
	// 	data : {
	// 		dayCount : ddCount
	// 	}
	// });	

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