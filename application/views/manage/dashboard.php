<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->config->item('site_name'); ?></title>
	<link href="/static/lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="/static/admin/css/main.css" rel="stylesheet">
	<script type="text/javascript" src="/static/lib/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/static/lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/lib/tinymce-4.6.4/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/static/lib/plupload-2.3.1/js/plupload.full.min.js"></script>
	<script type="text/javascript" src="/static/lib/vue-2.3.0/vue.js"></script>
</head>
<body class="container-fluid" id="rs-container">
	<?php
		//$this->load->view('manage/manage_header');

	?>
	<div id="rs-wrap">
		<div id="rs-mainmenu">
			<div id="rs-menu-wrap">
				<ul id="rs-menu">
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon rs-icon-dashboard"></div>
							<div class="rs-menu-name">控制台</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"><a href="/manage/article">文章</a></div>
						</a>
						<ul class="rs-submenu">
							<li class="rs-submenu-item rs-submenu-first rs-active"><a href="/manage/article" class="">所有文章</a></li>
							<li><a href="/manage/article/add">新建</a></li>
							<li><a href="#">分类</a></li>
							<li><a href="#">标签</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name">资源</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"><a href="/manage/question">试题</a></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name">评论</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name">设置</div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<div class="rs-menu-arrow"></div>
							<div class="rs-menu-icon"></div>
							<div class="rs-menu-name"></div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="rs-content">
			<div id="rs-topbar">
				<div class="top-links">
					<ul id="rs-topbar-default">
						<li id="rs-site-name"><a href="javascript:void(0);">系统分析之家</a></li>
					</ul>
					
				</div>
			</div>
			<div id="rs-body">
				<?php
				if(isset($rs_view_main) and !empty($rs_view_main)){
					$this->load->view($rs_view_main, $rs_view_data); 					
				} 
				?>
			</div>
		</div>
	</div>		
<script type="text/javascript">
$('document').ready(function(){

	$('.rs-submenu').on('mouseover', function(){
		$(this).css('top', '-5px');
	});

	$('#rs-menu>li').on('mouseenter', function(){
		//console.log("Mouse Over");
		$(this).find('.rs-submenu').css('top', '-5px');
	});

	$('#rs-menu>li').on('mouseout', function(){
		$(this).find('.rs-submenu').css('top', '-9999px');
	});
});
</script>
</body>
</html>
