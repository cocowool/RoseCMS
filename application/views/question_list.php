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
			if( empty($question_list) ){
				echo "<p>暂时还没有任何真题，敬请期待!</p>";
			}else{
				foreach ($question_list as $key => $value) {
			?>
				<div class="row rs-pl-item">
					<div class="col-md-6">
						<?php
						if( !empty($value['q_paper']) ){
						?>
						<a href="#"><?php echo $value['q_paper']; ?></a>
						<?php
						}
						?>
					</div>
					<div class="col-md-6">
						<a href="/question/<?php echo $value['id']; ?>"><?php echo "第 " . mb_substr($value['q_tihao'], 0, 22) . " 题"; ?></a>
					</div>
				</div>
			<?php
				}
			}
			?>
			</div>
			<div class="col-md-4" id="right-column">
				<div class="rs-google-ad" id="google-ad">
					<?php $this->load->view('adsense'); ?>					
				</div>
				<div class="rs-sidebox" id="date_counter">
					<div class="rs-date-counter">
						<p>距离2018年软考还有<span id="dateCounter">{{ dayCount }}</span>天</p>
						<p></p>
					</div>
				</div>
				<div class="rs-sidebox rs-friendlink">
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