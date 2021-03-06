<div id="rs-main">
	<div class="rs-wrap">
		<h1 class="rs-head">试题管理</h1>
		<div class="rs-operation"><a href="/manage/question/add">新增试题</a></div>
		<?php //echo validation_errors(); ?>
		<div id="rs-table-container">
			<div id="rs-question" class="row">
			<form action="<?php echo current_url(); ?>" method="post" id="rs-question-form" name="rs-question-form">
				<input type="hidden" id="q_id" name="q_id" value="<?php echo $question['id']; ?>">
				<div class="col-md-8">
					<div class="form-group">
						<label>隶属试卷</label>
						<input type="text" name="q_paper" id="q_paper" class="form-control" value="<?php echo !empty($question['q_paper'])?$question['q_paper']:''; ?>" placeholder="请输入隶书试卷">
					</div>

					<div class="form-group">
						<label>题号</label>
						<input type="text" name="q_tihao" id="q_tips" class="form-control" value="<?php echo !empty($question['q_tihao'])?$question['q_tihao']:''; ?>" placeholder="题号">
					</div>

					<div class="form-group">
						<label>试题类型</label>
						<select name="q_type" id="q_type" class="form-control">
							<option value="选择题" <?php if($question['q_type']=='选择题') echo 'selected' ?>>选择题</option>
							<option value="简答题" <?php if($question['q_type']=='简答题') echo 'selected' ?>>简答题</option>
						</select>
					</div>

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
					<div class="rs-side-ops">
						<div id="rs-publish" class="rs-sidebox">
							<h2 class="rs-hand"><span>发布</span></h2>
							<div class="rs-sb-inside">
								<div class="rs-postbox">
									<div></div>
									<div id="rs-publish-action">
										<div id="rs-publish-delete"></div>
										<div id="rs-publish-submit">
											<input type="submit" name="savedraft" id="savedraft" class="btn btn-primary" value="存草稿">
											<input type="submit" name="publish" id="publish" class="btn btn-primary" value="发布">
											<input type="hidden" name="post_action" id="post_action" value="" />
										</div>
									</div>
								</div>
							</div>
						</div>

						<div id="rs-category" class="rs-sidebox">
							<h2 class="rs-hand"><span>分类</span></h2>
							<div class="rs-sb-inside">
								<div class="rs-postbox">
									<ul id="rs-category-tabs" class="rs-tabs">
										<li class="rs-tabs-item rs-tabs-on">所有</li>
										<li class="rs-tabs-item">常用</li>
									</ul>
									<div class="rs-tabs-panel">
										<ul class="rs-checkbox-list">
										<form>
											<li><label class="rs-checkbox-item"><input type="checkbox" name="a[]"> 新闻</label></li>
											<li><label class="rs-checkbox-item"><input type="checkbox" name="a[]" / > 杂记</label></li>
											<li><label class="rs-checkbox-item"><input type="checkbox" name="a[]" checked="checked" /> 未分类</label></li>
										</form>
										</ul>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>

			</form>
			</div>
		</div>
	</div>				
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#savedraft').on('click',function(){
			$('#post_action').val('savedraft');
		});

		$('#publish').on('click',function(){
			$('#post_action').val('publish');
		});
	
		tinymce.init({
			theme: "modern",
			skin:"lightgray",
			language:"en",
			menubar: false,
			branding: false,
			plugins:'link,image,code,fullscreen',
			toolbar:"formatselect,undo,redo,bold,italic,blockquote,alignleft,aligncenter,alignright,strikethrough,removeformat,outdent,indent,link,image,code,fullscreen",
			//toolbar2:"hr,forecolor,pastetext,removeformat,charmap,wp_help,link,unlink,wp_more,spellchecker,dfw,wp_adv",
			//toolbar3:"",
			//toolbar4:"",
			selector: "#q_desc"
		});

	});
</script>