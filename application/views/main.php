<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>软考资料站</title>
	<meta name="keyword" content="软考，系统分析师，系统架构师">
	<meta name="description" content="系统分析师资料站">
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
			foreach ($article_list as $key => $value) {
			?>
				<div class="row rs-pl-item">
					<div class="col-md-3">
						<?php
						if( !empty($value['thumbnail']) ){
						?>
						<a href="#"><img src="<?php echo $value['thumbnail']['guid']; ?>" alt="<?php echo $value['thumbnail']['post_title']; ?>"></a>
						<?php
						}else{
						?>
						<a href="javascript:void(0);"><img class="img-thumbnail" src="/static/default/image/timg.jpg"></a>
						<?php
						}
						?>
					</div>
					<div class="col-md-9">
						<h2 class="rs-pl-title"><a href="/article/<?php echo $value['article']['id']; ?>"><?php echo mb_substr($value['article']['post_title'], 0, 22); ?></a></h2>
						<div class="rs-pl-meta">
							<span class="glyphicon glyphicon-time" aria-hidden="true"> <?php echo $value['article']['post_date']; ?></span>
							<!--
							<span class="glyphicon glyphicon-user" aria-hidden="true"> </span>
							<span class="glyphicon glyphicon-tag" aria-hidden="true"> </span>
							-->
						</div>
						<div class="rs-pl-content">
							<?php echo mb_substr(strip_tags($value['article']['post_content']), 0, 150) . "..."; ?>
						</div>
						<a href="/article/<?php echo $value['article']['id']; ?>" class="btn btn-default">了解更多</a>
					</div>
				</div>
			<?php
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
	var se = new Date('2018-05-19');
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