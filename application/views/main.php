<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/static/lib/bootstrap-4.1.0/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="/static/lib/bootstrap-4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/source/main.css">
	<title>软考资料站</title>
	<meta name="keyword" content="软考，系统分析师，系统架构师，真题">
	<meta name="description" content="软考资料分享，软考真题模拟">
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
	<nav id="rs-nav" class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">
		<a href="/" class="navbar-brand text-light"><img src="/static/default/image/sa_white.png" width="30" height="30">&nbsp;&nbsp;软考资料</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#rs-nav-menu" aria-controls="rs-nav-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="rs-nav-menu">
			<ul class="navbar-nav">
				<li class="nav-item active"><a href="/" class="nav-link">文章</a></li>
				<li class="nav-item"><a href="/question.html" class="nav-link">真题</a></li>
				<li class="nav-item"><a href="/about.html" class="nav-link">关于</a></li>
			</ul>
		</div>

		<div class="form-inline my-2 my-lg-0">
			<a href="/login.html" class="btn btn-sm btn-link collapse navbar-collapse text-light">登录</a>
			<a href="/register.html" class="btn btn-sm btn-link collapse navbar-collapse text-light">注册</a>
		</div>
	</nav>
	<div id="rs-content" class="container">
		<div class="row">
			<div class="col-md-8 py-3 p-y-3">
			<?php
			foreach ($article_list as $key => $value) {
			?>
				<div class="row rs_pl_item" id="rs-post-list">
					<div class="col-md-3 col-sm-0">
						<?php
						if( !empty($value['thumbnail']) ){
						?>
						<a href="#"><img class="img-thumbnail" src="<?php echo $value['thumbnail']['guid']; ?>" alt="<?php echo $value['thumbnail']['post_title']; ?>"></a>
						<?php
						}else{
						?>
						<a href="javascript:void(0);"><img class="img-thumbnail" src="/static/default/image/timg.jpg"></a>
						<?php
						}
						?>
					</div>
					<div class="col-md-9 col-sm-12">
						<h2 class="rs_pl_title"><a href="/article/<?php echo $value['article']['id']; ?>.html"><?php echo mb_substr(strip_tags($value['article']['post_title']), 0, 22); ?></a></h2>
						<div class="rs_pl_meta">
							<span class="glyphicon glyphicon-time" aria-hidden="true"> <?php echo $value['article']['post_date']; ?></span>
							<!--
							<span class="glyphicon glyphicon-user" aria-hidden="true"> </span>
							<span class="glyphicon glyphicon-tag" aria-hidden="true"> </span>
							-->
						</div>
						<div class="rs_pl_content">
							<?php echo mb_substr(strip_tags(htmlspecialchars_decode($value['article']['post_content'])), 0, 150) . "..."; ?>
						</div>
						<a href="/article/<?php echo $value['article']['id']; ?>" class="btn btn-default">了解更多</a>
					</div>
				</div>
			<?php
			}
			?>				
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
	<script type="text/javascript" src="/static/lib/vue-2.3.0/vue.js"></script>
	<script src="/static/lib/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/lib/bootstrap-4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//console.log("Document Ready");
		console.log(window.height);
	});

	var d = new Date();
	var se = new Date('2018-11-11');
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