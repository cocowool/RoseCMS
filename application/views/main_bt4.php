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

		<form action="/" class="form-inline my-2 my-lg-0">
			<button class="btn btn-sm btn-link collapse navbar-collapse text-light" type="submit">登录</button>
			<button class="btn btn-sm btn-link collapse navbar-collapse text-light" type="submit">注册</button>
		</form>
	</nav>
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
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link" href="#">上一页</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">下一页</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-md-4">
				<div id="rs-google-ad">
					<?php $this->load->view('adsense'); ?>					
				</div>
				<div class="bg-primary text-light p-1 align-middle text-center d-flex" id="date_counter">
					<div class="rs-date-counter align-middle text-center p-2">
						<p class="m-0 text-center">距离2018年软考还有<span id="dateCounter">{{ dayCount }}</span>天</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="container" id="rs-footer">
		
	</div>
	<script type="text/javascript" src="/static/lib/vue-2.3.0/vue.js"></script>
	<script src="/static/lib/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/lib/bootstrap-4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//console.log("Document Ready");
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
</script>
</body>
</html>
