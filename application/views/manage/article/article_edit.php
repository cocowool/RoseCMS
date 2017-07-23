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
											 		<a id="set-feature-image" href="#" data-toggle="modal" data-target="#rs-set-thumbnail">上传焦点图片</a>
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

		var uploader = new plupload.Uploader({
			browse_button : 'rs-uploader',
			url : '/manage/upload',
			chunk_size : '1mb',
			//multipart : true,
			multi_selection : false,
			filters : {
				max_file_size : '10mb',
	            mime_types: [
	                {title : "Image files", extensions : "jpg,gif,png"},
	                {title : "Zip files", extensions : "zip"}
	            ]
			},
			flash_swf_url : '../js/Moxie.swf',
			silverlight_xap_url : '../js/Moxie.xap',
	        preinit : {
	            Init: function(up, info) {
	                //console.log('[Init]', 'Info:', info, 'Features:', up.features);
	            },
	 
	            UploadFile: function(up, file) {
	                //console.log('[UploadFile]', file);
	            }
	        },
			init : {
				PostInit: function() {
					// Called after initialization is finished and internal event handlers bound
					//console.log('[PostInit]');
					
					// document.getElementById('uploadfiles').onclick = function() {
					// 	uploader.start();
					// 	return false;
					// };
				},

				Browse: function(up) {
	                // Called when file picker is clicked
	                console.log('[Browse]');
	            },

	            Refresh: function(up) {
	                // Called when the position or dimensions of the picker change
	                console.log('[Refresh]');
	            },
	 
	            StateChanged: function(up) {
	                // Called when the state of the queue is changed
	                console.log('[StateChanged]', up.state == plupload.STARTED ? "STARTED" : "STOPPED");
	            },
	 
	            QueueChanged: function(up) {
	                // Called when queue is changed by adding or removing files
	                console.log('[QueueChanged]');
	            },

				OptionChanged: function(up, name, value, oldValue) {
					// Called when one of the configuration options is changed
					console.log('[OptionChanged]', 'Option Name: ', name, 'Value: ', value, 'Old Value: ', oldValue);
				},

				BeforeUpload: function(up, file) {
					// Called right before the upload for a given file starts, can be used to cancel it if required
					console.log('[BeforeUpload]', 'File: ', file);
				},
	 
	            UploadProgress: function(up, file) {
	                // Called while file is being uploaded
	                console.log('[UploadProgress]', 'File:', file, "Total:", up.total);
					console.log(file.percent);
	            },

				FileFiltered: function(up, file) {
					// Called when file successfully files all the filters
	                console.log('[FileFiltered]', 'File:', file);
				},
	 
	            FilesAdded: function(up, files) {
	                // Called when files are added to queue
	                console.log('[FilesAdded]');
	 
	                plupload.each(files, function(file) {
	                    console.log('  File:', file);
	                });

					uploader.start();
	            },
	 
	            FilesRemoved: function(up, files) {
	                // Called when files are removed from queue
	                console.log('[FilesRemoved]');
	 
	                plupload.each(files, function(file) {
	                    console.log('  File:', file);
	                });
	            },
	 
	            FileUploaded: function(up, file, info) {
	                // Called when file has finished uploading
	                console.log('[FileUploaded] File:', file, "Info:", info);
	            },
	 
	            ChunkUploaded: function(up, file, info) {
	                // Called when file chunk has finished uploading
	                console.log('[ChunkUploaded] File:', file, "Info:", info);
	            },

				UploadComplete: function(up, files) {
					// Called when all files are either uploaded or failed
	                console.log('[UploadComplete]');
				},

				Destroy: function(up) {
					// Called when uploader is destroyed
	                console.log('[Destroy] ');
				},
	 
	            Error: function(up, args) {
	                // Called when error occurs
	                console.log('[Error] ', args);
	            }
			}
		});

		uploader.init();
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
