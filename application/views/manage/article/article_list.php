<div id="rs-main">
	<div class="rs-wrap">
		<h1 class="rs-head">文章管理</h1>
		<?php //echo validation_errors(); ?>
		<div id="rs-table-container">
			<table id="rs_table" class="table table-striped table-hover">
				<tr>
					<th>标题</th>
					<th>作者</th>
					<th>分类</th>
					<th>标签</th>
					<th>评论</th>
					<th>日期</th>
					<th>操作</th>
				</tr>
				<?php
				$html = '';
				foreach ($articles as $key => $value) {
					$html .= '<tr>';
					$html .= '<td>' . $value['post_title'] . '</td>';
					$html .= '<td>' . $value['post_author'] . '</td>';
					$html .= '<td></td>';
					$html .= '<td></td>';
					$html .= '<td></td>';
					$html .= '<td>' . $value['post_date'] . '</td>';
					$html .= '<td><a href="/manage/article/add/' . $value['id'] . '">编辑</a>&nbsp;&nbsp;<a href="/manage/article/del/' . $value['id'] . '">删除</a></td>';
					$html .= '</tr>';
				}

				echo $html;
				?>
			</table>
		</div>
	</div>				
</div>
