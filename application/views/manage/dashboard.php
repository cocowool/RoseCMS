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
				<div id="rs-main">
					<div class="rs-wrap">
						<h1 class="rs-head">文章管理</h1>
						<div id="rs-operation">
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						    		文章
						    		<span class="caret"></span>
						  		</button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="/data/event">文章列表</a></li>
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="/data/event/add">发表文章</a></li>
								</ul>
							</div>							
						</div>
						<div id="rs-table-container">
							<div class="row" id="rs-article">
							<form>
								<div class="col-md-8">
									<div class="form-group">
										<label>文章标题</label>
										<input type="text" name="rs-title" id="rs-title" class="form-control" placeholder="请输入标题">
									</div>
									<div class="form-group">
										<label>文章内容</label>
										<textarea class="form-control" style="height:500px; z-index: 0;">
											
										</textarea>
									</div>
								</div>
								<div class="col-md-4">
									<div>
										<div id="rs-publish" class="rs-sidebox">
											<h2 class="rs-hand"><span>发布</span></h2>
											<div class="rs-sb-inside">
												
											</div>
										</div>
									</div>
								</div>								
							</form>
							</div>

						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>		
</body>
</html>
