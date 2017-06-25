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
							<div class="rs-menu-name">文章</div>
						</a>
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
				
			</div>
		</div>
	</div>		
<script>

  tinymce.init({
    selector: '#rs-article-content'
  });
  </script>
</body>
</html>
