<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->config->item('site_name'); ?></title>
	<link href="/static/lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="/static/lib/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php
		//$this->load->view('manage/manage_header');

	?>
	<div id="rs-wrap">
		<div id="rs-mainmenu">
			<div>
				<ul><li><a href="javascript:void(0);">发布</a></li></ul>
			</div>
		</div>
		<div id="rs-content">
			<div id="rs-topbar">
				
			</div>
			<div id="rs-body">
				<?php 
				if(isset($default_view) and !empty($default_view)){
					$this->load->view($default_view, $data);
				}
				?>
			</div>
		</div>
	</div>		
</body>
</html>
