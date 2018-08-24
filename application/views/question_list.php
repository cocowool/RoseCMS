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
				<div id="rs-breadcrum">
					<a href="/" class="mr-1">首页</a>&gt;
					<a href="/question.html" class="text-muted">真题</a>
				</div>
				<div id="rs-question-list" class="pt-1 pb-1">
					<ul class="list-group list-group-flush">
				<?php
				if( empty($question_list) ){
					echo "<p>暂时还没有任何真题，敬请期待!</p>";
				}else{
					foreach ($question_list as $key => $value) {
				?>
					<li class="list-group-item list-group-item-action"><?php
					if( !empty($value['q_paper']) ){
					?>
					<a href="#"><?php echo $value['q_paper']; ?></a>
					<?php
					}
					?>&nbsp;/&nbsp;
					<a href="/question/detail/<?php echo $value['id']; ?>.html"><?php echo "<span class='d-none d-sm-inline'>第 </span>" . mb_substr($value['q_tihao'], 0, 22) . " 题"; ?></a>
					</li>	
				<?php
					}
				}
				?>				
					</ul>
				</div>
				<div id="rs-question-page">
					<nav aria-label="Page navigation example">
						<?php
							echo $page_links;
						?>
					</nav>
				</div>
			</div>
			<div class="col-md-4">
				<div id="rs-google-ad">
					<?php $this->load->view('adsense'); ?>					
				</div>
				<div class="bg-primary text-light p-1 align-middle text-center d-flex my-2 m-y-2 py-1 p-y-1" id="date_counter">
					<div class="rs-date-counter align-middle text-center p-2">
						<p class="m-0 text-center">距离2018年软考还有<span id="dateCounter">{{ dayCount }}</span>天</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="container-fluid  bg-dark pt-4 p-t-4" id="rs-footer">
		<div class="container">
			<div class="row">
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
	<script src="/static/lib/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/lib/bootstrap-4.1.0/js/bootstrap.min.js"></script>
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
				}
			})
		});
	});

	$(document).ready(function(){
		//console.log("Document Ready");
		if($(document).height() > $('#rs-content').height()){
			$('#rs-content').height(($(document).height() - 300));
		}
	});

	var d = new Date();
	var se = new Date('2018-11-10');
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
</script>
</body>
</html>