<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>软考资料站</title>
	<meta name="keyword" content="软考，系统分析师，系统架构师，历年真题，软考历年真题">
	<meta name="description" content="系统分析师资料站，历年真题分析">
	<link href="/static/lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' id='twentyseventeen-style-css'  href='/static/css/main.css' type='text/css' media='all' />
	<script type="text/javascript" src="/static/lib/vue-2.3.0/vue.js"></script>
	<script type="text/javascript" src="/static/lib/jquery/jquery-3.2.1.min.js"></script>
</head>
<body class="">
	<div class="rs-top-menu container">
		<?php
			$this->load->view('menu');
		?>
	</div>
	<div class="rs-body container">
		<div class="row">
			<div class="col-md-8 rs-post-list">
			<?php
			if( empty($question) ){
				echo "<p>获取真题内容失败！</p>";
			}else{
				
			?>
				<div class="row rs-q-nav">
					<h4>真题 &gt; <a href="#"><?php echo $question['q_paper']; ?></a></h3>
				</div>
				<div class="row rs-q-detail">
					<div class="rs-q-title">
						<div><b>题目</b></div>
						<div class="rs-q-title-content">
							<?php echo $question['q_title']; ?>
						</div>					
					</div>
					<div>
					<form action="#">
					<?php
					if($question['q_type'] == ""){
					?>
						<div><b>选项</b></div>
						<div class="rs-q-option form-group">
							<label for="a">A</label> <input type="radio" name="a" value=""> <?php echo $question['q_option_1']; ?></div>
						<div class="rs-q-option form-group">
							<label for="a">B</label> <input type="radio" name="a" value=""> <?php echo $question['q_option_2']; ?></div>
						<div class="rs-q-option form-group">
							<label for="a">C</label> <input type="radio" name="a" value=""> <?php echo $question['q_option_3']; ?></div>
						<div class="rs-q-option form-group">
							<label for="a">D</label> <input type="radio" name="a" value=""> <?php echo $question['q_option_4']; ?></div>
					<?php
					}else{
					?>
						<div><b>问题</b></div>
						<div><?php echo $question['q_desc']; ?></div>
					<?php
					}
					?>
						<div class="rs-q-operation form-group">
							<button type="submit" class="btn btn-default">提交 并查看答案解析</button>
							<button type="button" class="btn btn-warning">错误反馈</button>
						</div>
					</form>	
					</div>

					<div style="min-height:110px; height:110px; display:block;">
						
					</div>
				</div>
			<?php
			}
			?>
			</div>
			<div class="col-md-4" id="right-column">
				<div class="rs-sidebox rs-friendlink">
					
				</div>
				<div class="rs-google-ad" id="google-ad">
					<?php $this->load->view('adsense'); ?>					
				</div>
			</div>
		</div>
	</div>
	<div class="rs-footer">
	<?php
		$this->load->view('footer');
	?>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		console.log("Document Ready");
	});

	var d = new Date();
	var se = new Date('2018-05-26');
	var ddCount = parseInt( (Math.abs(se - d))/1000/60/60/24 ); 

	var vm = new Vue({
		el:"#dateCounter",
		beforeCreate : function(){
			console.log("Before Vue is created");
			// console.log(d);
			// console.log(se);
		},
		mounted : function(){
			console.log("Vue is ready!");
		},
		data : {
			dayCount : ddCount
		}
	});	

	//vm.$mount('#date_counter')

	// var google_ad = new Vue({
	// 	el:"#date_counter",
	// 	data(){
	// 		return {
	// 			scroll:''
	// 		}
	// 	},
	// 	methods: {
	// 		google() {
	// 			this.scroll = document.body.scrollTop;
	// 			console.log(this.scroll);
	// 		},

	// 		mounted() {
	// 			console.log("Event Listener");
	// 			window.addEventListener('scroll', this.google)
	// 		}
	// 	}
	// });

	// var app = new Vue({
	// 	el:"#date_counter",
	// 	data:{
	// 		message:"距离下半年软考还有"
	// 	}
	// });
</script>
</html>