<!Doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title><?php echo $this->config->item('adm_sys_title'); ?></title>
	<style type='text/css'>
		* html,body { margin:0px; padding:0px; }
		frame { margin:0px;, padding:0px; }
	</style>
</head>
<frameset id='mainFrm' name='mainFrm' cols='*' frameborder='yes' rows='80,*,20' border='0'>
    <frame name='topFrm' id='topFrm' src='<?php echo base_url( $this->config->item('adm_segment') . '/main/top.html'); ?>' rows='80' scrolling='no' noresize='noresize'></frame>
    <frameset id='contentFrm' name='contentFrm' rows='*' cols='180,0,*'>
        <frame id='menuFrm' name='menuFrm' src='<?php echo base_url( $this->config->item('adm_segment') .  '/main/menu.html'); ?>' cols='180' frameborder='0' noresize='noresize' scrolling='' />
		<frame id='barFrm' name='barFrm' src='<?php echo base_url('manage/main/bar.html'); ?>' noresize='noresize' scrolling='no' />
		<frame id='panelFrm' name='panelFrm' src='<?php echo base_url('manage/main/welcome.html'); ?>' />
    </frameset>
	<frame name='bottomFrm' id='bottomFrm' src='<?php echo base_url($this->config->item('adm_segment') .   '/main/bottom.html'); ?>' rows='20' scrolling='no' />
</frameset>
<noframes>

</noframes>
</html>