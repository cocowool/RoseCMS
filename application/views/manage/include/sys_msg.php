<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>跳转页面</title>
	<script type="text/javascript" src="/static/lib/yui3.10.0/yui/yui-min.js"></script>
</head>
<body>
<?php
	//用来显示操作信息，并在显示信息一定时间后，进行页面的跳转
?>
<div class="sysMsg">
	<div>
		<h3><?php echo $title; ?></h3>
		<div class="textInfo">
			<p><?php echo $content; ?></p>
			<p>After <?php echo $timeout/1000; ?> seconds, we will redirect ...</p>
			<p><?php //echo $url; ?></p>
		</div>
	</div>
</div>
<script type="text/javascript">
	var uri = '<?php echo $url; ?>';
	setTimeout(function(){
		window.location = uri; 
	}, <?php echo $timeout; ?>);
</script>
</body>
</html>
