<div id="rs-main">
	<div class="rs-wrap">
		<h1 class="rs-head">试题管理</h1>
		<div class="rs-operation"><a href="/manage/question/add">新增试题</a></div>
		<?php //echo validation_errors(); ?>
		<div id="rs-table-container">
			<div id="rs-question" class="row">
			<form action="<?php echo current_url(); ?>" method="post" id="rs-question-form" name="rs-question-form">
				
				<div class="col-md-8">
					<div class="form-group">
						<label>试题题目</label>
						<input type="text" name="q_title" id="q_title" class="form-control" value="<?php echo !empty($question['q_title'])?$question['q_title']:''; ?>" placeholder="请输入试题题目">
					</div>
					<div class="form-group">
						<label>试题描述</label>
						<input type="text" name="q_desc" id="q_desc" class="form-control" value="<?php echo !empty($question['q_desc'])?$question['q_desc']:''; ?>" placeholder="请输入试题描述">
					</div>

					<div class="form-group">
						<label>选项1</label>
						<input type="text" name="q_option_1" id="q_option_1" class="form-control" value="<?php echo !empty($question['q_option_1'])?$question['q_option_1']:''; ?>" placeholder="请输入选项1的内容">
					</div>

					<div class="form-group">
						<label>选项2</label>
						<input type="text" name="q_option_2" id="q_option_2" class="form-control" value="<?php echo !empty($question['q_option_2'])?$question['q_option_2']:''; ?>" placeholder="请输入选项2的内容">
					</div>

					<div class="form-group">
						<label>选项3</label>
						<input type="text" name="q_option_3" id="q_option_3" class="form-control" value="<?php echo !empty($question['q_option_3'])?$question['q_option_3']:''; ?>" placeholder="请输入选项3的内容">
					</div>

					<div class="form-group">
						<label>选项4</label>
						<input type="text" name="q_option_4" id="q_option_4" class="form-control" value="<?php echo !empty($question['q_option_4'])?$question['q_option_4']:''; ?>" placeholder="请输入选项4的内容">
					</div>
					
					<div class="form-group">
						<label>正确答案</label>
						<input type="text" name="q_answer" id="q_answer" class="form-control" value="<?php echo !empty($question['q_answer'])?$question['q_answer']:''; ?>" placeholder="请选择正确答案">
					</div>

					<div class="form-group">
						<label>题目解析</label>
						<input type="text" name="q_tips" id="q_tips" class="form-control" value="<?php echo !empty($question['q_tips'])?$question['q_tips']:''; ?>" placeholder="请输入试题解析">
					</div>

				</div>

				<div class="col-md-4">
					
				</div>

			</form>
			</div>
		</div>
	</div>				
</div>