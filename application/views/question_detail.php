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
	<script>
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "https://hm.baidu.com/hm.js?d8942469c6b491646211f9397a226b44";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	</script>
</head>
<body>
	<?php
		$this->load->view('top_nav');
	?>

	<div id="rs-content" class="container">
		<div class="row">
			<div class="col-md-8">
				<?php 
				if( empty($question) ){
					echo "<div><p>获取真题内容失败！</p></div>";
				}else{
				?>
				<div id="rs-breadcrum">
					<a href="/" class="mr-1">首页</a>&gt;
					<a href="/question.html" class="text-muted mr-1">真题</a>&gt;
					<a href="#"><?php echo $question['q_paper']; ?></a>
				</div>
				<div id="rs-question">
				<form action="">
					<div class="py-2 p-y-2">
						<div class="rs_q_title">
							题目
						</div>						
						<?php echo $question['q_title']; ?>
					</div>
				<?php
					if($question['q_type'] == "选择题"){
					?>
						<div><b>选项</b></div>
						<div class="form-check">
							<input type="radio" class="form-check-input" name="question_option" id="a" value="a"> <label for="a" class="form-check-label"><b>A</b> <?php echo $question['q_option_1']; ?></label></div>
						<div class="form-check">
							<input type="radio" class="form-check-input" name="question_option" id="b" value="b"> <label for="b" class="form-check-label"><b>B</b> <?php echo $question['q_option_2']; ?></label></div>
						<div class="form-check">
							<input type="radio" class="form-check-input" name="question_option" id="c" value="c"> <label for="c" class="form-check-label"><b>C</b> <?php echo $question['q_option_3']; ?></label></div>
						<div class="form-group form-check">
							<input type="radio" class="form-check-input" name="question_option" id="d" value="d"> <label for="d" class="form-check-label"><b>D</b> <?php echo $question['q_option_4']; ?></label></div>
					<?php
					}else{
					?>
						<div><b>问题</b></div>
						<div><?php echo htmlspecialchars_decode($question['q_desc']); ?></div>
					<?php
					}
					?>
					<div class="rs_q_operation form-group">
						<button type="submit" id="rs-submit" class="btn btn-primary" <?php if(!$this->session->userdata('rs_user_login')){ echo 'data-toggle="tooltip" data-placement="top" title="请先登陆"'; } ?> >提交 并查看答案解析</button>
						<button type="button" id="rs-feedback" class="btn btn-warning" <?php if(!$this->session->userdata('rs_user_login')){ echo 'data-toggle="tooltip" data-placement="top" title="请先登陆"'; } ?>>错误反馈</button>
					</div>

				</form>
				</div>
				<?php
				}
				?>
			</div>
			<div class="col-md-4" id="right-column">
				<div class="row text-center text-sm-center text-md-left">
					<div class="col-md-4">
						<div id="qrcode">
							
						</div>						
					</div>
					<div class="col-md-8" style="color:#88b5e5; line-height: 1.2em;">
						<h5>扫描二维码<br />在手机中做题<br />随时随地尽在掌握</h5>
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

	<div class="container-fluid  bg-dark" id="rs-footer">
		<div class="container">
			<div class="row py-2 p-y-2">
				<div class="col-md-2">
					<div class="rs-ft-about">
						<p class="text-center text-md-left"><img src="/static/default/image/sapublic.jpg" width="129px"></p>					
					</div>
				</div>
				<div class="col-md-4">
					<div class="rs-ft-about text-center text-sm-center text-md-left text-light">
						<h5>关于我们</h5>
						<p>本站致力于分享与计算机技术与软件专业技术资格（水平）考试相关的所有信息，为所有软考路上的朋友提供所需帮助，您可以关注我们的微信公众号，进行随时的自我测验以及与更多的考友一起交流。</p>
						<p>Copyright &copy; 2018 京ICP备15058613－1号</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="rs-ft-about text-light text-center text-sm-center text-md-left">
						<h5>友情链接</h5>
						<ul class="rs_friendlink">
							<li><a href="http://www.ruankao.org.cn/jsjnew/cms/focusNews/">中国计算机技术职业资格网</a></li>
							<li><a href="http://www.miit.gov.cn">中华人民共和国工业和信息化部</a></li>
							<li><a href="http://cnblogs.com/cocowool">小狼的世界</a></li>
						</ul>					
					</div>				
				</div>
			</div>
			
		</div>
	</div>	

	<?php
		$this->load->view('foot_modal');
	?>

	<script type="text/javascript" src="/static/lib/vue-2.3.0/vue.js"></script>
	<script type="text/javascript" src="/static/lib/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/static/lib/jquery/js.cookie.js"></script>
	<script type="text/javascript" src="/static/lib/jquery/jquery-qrcode-0.14.0.min.js"></script>
	<script type="text/javascript" src="/static/lib/bootstrap-4.1.0/js/bootstrap.bundle.min.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		//console.log("Document Ready");
		// console.log(window.height);
		$('#username').on('input', function(){
			$('#username').parent().removeClass('alert alert-danger');
			$('#username').prev().html('');
		});

		$('#password').on('input', function(){
			$('#password').parent().removeClass('alert alert-danger');
			$('#password').prev().html('');
		});

		$('#btn_login').on('click', function(){
			//表单校验
			if($('#username').val() == ""){
				$('#username').parent().addClass('alert alert-danger');
				$('#username').prev().html('用户名不能为空');
			}

			if($('#password').val() == ""){
				$('#password').parent().addClass('alert alert-danger');
				$('#password').prev().html('密码不能为空');
			}

			$.ajax({
				'url'	:	'/login/json',
				'method':	'post',
				'dataType':	'json',
				'data'	:	{
					'username'	:	$('#username').val(),
					'password'	:	$('#password').val()
				},
				'success': function(data){
					var user = data.data;
					console.log(user);
					$('#rs_login_modal').modal('hide');
					$('#rs-tr-container').html('<div class="text-light">' + user.user_nicename + ' 欢迎回来，<a class="text-light" href="/logout.html">退出</a></div>');
					Cookies.set('rs_user_login', '1');
				}
			})
		});
	});

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();

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

		//console.log("Document Ready");
		if($(document).height() > $('#rs-content').height()){
			// console.log($(document).height());
			// console.log($('#rs-content').height());
			// console.log($(document).height() - 300);
			// $('#rs-content').height(($(document).height() - 300));
			// $('#rs-content .container').height(($(document).height() - 300));
			// console.log($('#rs-content').height());

		}
	});

	$('#rs-submit').click(function(e){
		e.preventDefault();
		//检查Cookie初步判断是否登陆
		if( ! Cookies.get('rs_user_login') ){
			alert('请先登陆！');
		}else{
			var val=$('input:radio[name="question_option"]:checked').val();
			if(val == null){
				alert("请选择！");
				return false;
			}else{
				$.ajax({
					'url'	:	'/question/check',
					'method':	'post',
					'dataType':	'json',
					'data'	:	{
						'question_id'		:	<?php echo $question['id']; ?>,
						'question_option'	:	val
					},
					'success': function(data){
						alert(data.errorinfo);
					}
				});
			}
		}
		
	});

	$('#rs-feedback').click(function(e){
		e.preventDefault();
	});

	var vm = new Vue({

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