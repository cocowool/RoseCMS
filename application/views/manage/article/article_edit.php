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

				<div class="modal media-modal wp-core-ui" id="rs-set-thumbnail">
					<div class="modal-dialog">
					<button type="button" class="media-modal-close">
						<span class="media-modal-icon"><span class="screen-reader-text">Close media panel</span></span>
					</button>
					<div class="media-modal-content">
						<div class="media-frame mode-select wp-core-ui hide-menu" id="__wp-uploader-id-0">
							<div class="media-frame-menu">
								<div class="media-menu"><a href="#" class="media-menu-item active">Featured Image</a></div>
							</div>
							<div class="media-frame-title">
								<h1>Featured Image<span class="dashicons dashicons-arrow-down"></span></h1>
							</div>
							<div class="media-frame-router">
								<div class="media-router">
									<a href="#" class="media-menu-item active">Upload Files</a>
									<a href="#" class="media-menu-item">Media Library</a>
								</div>
							</div>
							<div class="media-frame-content">
								<div class="uploader-inline">
									<div class="uploader-inline-content no-upload-message">
										<div class="upload-ui">
											<h2 class="upload-instructions drop-instructions">Drop files anywhere to upload</h2>
											<p class="upload-instructions drop-instructions">or</p>
											<button type="button" class="browser button button-hero" id="__wp-uploader-id-1" style="display: inline-block; position: relative; z-index: 1;">Select Files</button>
										</div>
										<div class="upload-inline-status">
											<div class="media-uploader-status" style="display: none;">
												<h2>Uploading</h2>
												<button type="button" class="button-link upload-dismiss-errors">
													<span class="screen-reader-text">Dismiss Errors</span>
												</button>
												<div class="media-progress-bar"><div></div></div>
												<div class="upload-details">
													<span class="upload-count">
														<span class="upload-index"></span> / <span class="upload-total"></span>
													</span>
													<span class="upload-detail-separator">–</span>
													<span class="upload-filename"></span>
												</div>
												<div class="upload-errors"></div>
											</div>
										</div>
										<div class="post-upload-ui">
											<p class="max-upload-size">Maximum upload file size: 128 MB.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="media-frame-toolbar">
								<div class="media-toolbar">
									<div class="media-toolbar-secondary"></div>
									<div class="media-toolbar-primary search-form">
										<button type="button" class="button media-button button-primary button-large media-button-select" disabled="disabled">Set featured image</button>
									</div>
								</div>
							</div>
							<div class="media-frame-uploader">
								<div class="uploader-window">
									<div class="uploader-window-content">
										<h1>Drop files to upload</h1>
									</div>
								</div>
							</div>
							<div id="html5_1blce2rstqgn1kdhtbo1b621kp65_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 319px; left: 534px; width: 148px; height: 46px; overflow: hidden; z-index: 0;"><input id="html5_1blce2rstqgn1kdhtbo1b621kp65" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" multiple="" accept="image/jpeg,.jpg,.jpeg,.jpe,image/gif,.gif,image/png,.png,image/bmp,.bmp,image/tiff,.tiff,.tif,.ico,.asf,.asx,video/x-ms-wmv,.wmv,.wmx,.wm,video/avi,.avi,.divx,video/x-flv,.flv,video/quicktime,.mov,.qt,video/mpeg,.mpeg,.mpg,.mpe,video/mp4,.mp4,video/x-m4v,.m4v,video/ogg,.ogv,video/webm,.webm,video/x-matroska,.mkv,video/3gpp,.3gp,.3gpp,video/3gpp2,.3g2,.3gp2,text/plain,.txt,.asc,.c,.cc,.h,.srt,text/csv,.csv,.tsv,.ics,.rtx,text/css,.css,text/html,.htm,.html,.vtt,.dfxp,audio/mpeg,.mp3,audio/x-m4a,.m4a,.m4b,.ra,.ram,audio/x-wav,.wav,audio/ogg,.ogg,.oga,.mid,.midi,audio/x-ms-wma,.wma,.wax,.mka,text/rtf,.rtf,application/x-javascript,.js,application/pdf,.pdf,.class,.tar,application/zip,.zip,.gz,.gzip,.rar,.7z,image/photoshop,.psd,.xcf,application/msword,.doc,application/vnd.ms-powerpoint,.pot,.pps,.ppt,.wri,.xla,application/vnd.ms-excel,.xls,.xlt,.xlw,.mdb,.mpp,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.docx,.docm,application/vnd.openxmlformats-officedocument.wordprocessingml.template,.dotx,.dotm,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,.xlsx,.xlsm,.xlsb,.xltx,.xltm,.xlam,application/vnd.openxmlformats-officedocument.presentationml.presentation,.pptx,.pptm,application/vnd.openxmlformats-officedocument.presentationml.slideshow,.ppsx,.ppsm,application/vnd.openxmlformats-officedocument.presentationml.template,.potx,.potm,.ppam,.sldx,.sldm,.onetoc,.onetoc2,.onetmp,.onepkg,.oxps,.xps,.odt,.odp,.ods,.odg,.odc,.odb,.odf,.wp,.wpd,.key,.numbers,.pages"></div>
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
