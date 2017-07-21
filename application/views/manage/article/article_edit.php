				<div id="rs-main">
					<div class="rs-wrap">
						<h1 class="rs-head">文章管理</h1>
						<?php //echo validation_errors(); ?>
						<div id="rs-table-container">
							<div class="row" id="rs-article">
							<form action="<?php echo current_url(); ?>" method="post" id="rs-post-form" name="rs-post-form">
								<div class="col-md-8">
									<div class="form-group">
										<label>文章标题</label>
										<input type="text" name="post_title" id="rs-title" class="form-control" placeholder="请输入标题">
									</div>
									<div class="form-group">
										<label>文章内容</label>
										<textarea id="rs-article-content" name="post_content" class="form-control" style="height:300px; z-index: 0;">
											
										</textarea>
									</div>
								</div>

								<div class="col-md-4">
									<div>
										<div id="rs-publish" class="rs-sidebox">
											<h2 class="rs-hand"><span>发布</span></h2>
											<div class="rs-sb-inside">
												<div class="rs-postbox">
													<div></div>
													<div id="rs-publish-action">
														<div id="rs-publish-delete"></div>
														<div id="rs-publish-submit">
															<input type="submit" name="publish" id="publish" class="btn btn-primary" value="发布">
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

										<div class="rs-sidebox" id="rs-featureimage">
											<h2 class="rs-hand">焦点图片</h2>
											 <div class="rs-sb-inside">
											 	<p>
											 		<a id="set-feature-image" href="javascript:void(0);" data-toggle="modal" data-target="#rs-set-thumbnail">上传焦点图片</a>											 		
											 	</p>
											 </div>
										</div>
									</div>
								</div>								
							</form>
							</div>

						</div>
					</div>				
				</div>

				<div class="modal fade in" role="dialog" id="rs-set-thumbnail">
					<div class="modal-dialog">
					<button style="display:none;" type="button" class="media-modal-close">
						<span class="media-modal-icon"><span class="screen-reader-text">Close media panel</span></span>
					</button>
					<div class="modal-content">
						<div class="modal-header">
							<h5>设置头图</h5>
						</div>
						<div class="modal-body">
							<ul class="rs-meida-router nav nav-tabs">
								<li class="active"><a href="#" class="rs-media-menu">上传文件</a></li>
								<li><a href="#" class="rs-media-menu">媒体库</a></li>
							</ul>
							<div class="rs-meida-frame rs-uploader">
								<div class="rs-upload-content">
									<h2>选择需要上传的文件</h2>
									<button type="button" class="browser button button-hero" id="rs-uploader" style="display: inline-block; position: relative; z-index: 1;">选择文件</button>
								</div>
								<div class="rs-upload-tip">
									<p class="max-upload-size">允许上传的最大文件大小: <?php echo ini_get('upload_max_filesize'); ?>.</p>
								</div>
							</div>
							<div class="rs-media-frame rs-hide">
								
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-primary" value="保存">
						</div>
						
					</div>
					</div>
				</div>

<script type="text/javascript">
	$('document').ready(function(){
		//console.log("Hello world");
		$('#set-feature-image').click(function(e){
			e.preventDefault();
		});
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
	selector: "#rs-article-content"

	});
</script>
