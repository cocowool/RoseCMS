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
	<script type="text/javascript" src="/static/lib/vue/vue.js"></script>
</head>
<body class="">
	<div class="rs-top-menu container">
		<?php
			$this->load->view('menu');
		?>
	</div>
	<div class="rs-body container">
		<div class="row">
			<div class="col-md-8 rs-post-list">
			<?php
			foreach ($article_list as $key => $value) {
			?>
				<div class="row rs-pl-item">
					<div class="col-md-3">
						<a href="javascript:void(0);"><img class="img-thumbnail" src="/static/default/image/timg.jpg"></a>
					</div>
					<div class="col-md-9">
						<h2 class="rs-pl-title"><a href="/article/<?php echo $value['id']; ?>"><?php echo mb_substr($value['post_title'], 0, 22); ?></a></h2>
						<div class="rs-pl-meta">
							<span class="glyphicon glyphicon-time" aria-hidden="true"> <?php echo $value['post_date']; ?></span>
							<!--
							<span class="glyphicon glyphicon-user" aria-hidden="true"> </span>
							<span class="glyphicon glyphicon-tag" aria-hidden="true"> </span>
							-->
						</div>
						<div class="rs-pl-content">
							<?php echo mb_substr(strip_tags($value['post_content']), 0, 150) . "..."; ?>
						</div>
						<a href="/article/<?php echo $value['id']; ?>" class="btn btn-default">了解更多</a>
					</div>
				</div>
			<?php
			}
			?>
			</div>
			<div class="col-md-4">
				<div class="rs-google-ad">
					<?php $this->load->view('adsense'); ?>					
				</div>
				<div class="rs-friendlink">
					<h3>友情链接</h3>
					<ul>
						<li><a href="http://www.ruankao.org.cn/jsjnew/cms/focusNews/">中国计算机技术职业资格网</a></li>
						<li><a href="http://www.miit.gov.cn">中华人民共和国工业和信息化部</a></li>
						<li><a href=""></a></li>
						<li><a href=""></a></li>
						<li><a href=""></a></li>
					</ul>
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
	
</script>
</html>