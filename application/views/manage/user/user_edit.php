<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title ?></title>
	<style type="text/css">
		@import url('/static/lib/yui3.10.0/cssreset/cssreset-min.css');
		@import url('/templates/adm_default/css/public.css');
	</style>
	<script type="text/javascript" src="/static/lib/ckeditor4.1.1/ckeditor.js"></script>
	</head>
<body class="yui-skin-sam">
<div id="doc3" class="yui-t1">
	<h3 class="content_title"><?php echo $title; ?></h3>
	<div class="">
		<?php
			if (validation_errors ()) {
				echo "<div id='errors'>";
				echo 	validation_errors ();
				echo "</div>";
			}
		?>
		<div></div>
		<div class="contentContainer mtiadmin_content">
		<?php
			echo $html_form;
		?>
		</div>
		<div id="map">

		</div>
	</div>
</div>
</body>
</html>
