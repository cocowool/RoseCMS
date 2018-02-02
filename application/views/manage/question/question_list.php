<div id="rs-main">
	<div class="rs-wrap">
		<h1 class="rs-head">试题管理</h1>
		<div class="rs-operation"><a href="/manage/question/add">新增试题</a></div>
		<?php //echo validation_errors(); ?>
		<div id="rs-table-container">
			<table id="rs-table" class="table table-striped table-hover">
				<tr>
					<th></th>
					<th>题目类型</th>
					<th>题目</th>
					<th>创建日期</th>
					<th>创建日期</th>
					<th>作者</th>
					<th>操作</th>
				</tr>
				
			</table>
		</div>
	</div>				
</div>
<script type="text/javascript">
$(document).ready(function(){
	console.log("Hello");

	var dt = $('#rs_table').DataTable({
		'processing': true,
		'serverSide': true,
		'searching':true,
		'stateSave': true,
		'language': {
			'emptyTable':'暂无数据',
			'loadingRecords':'后台正在拼命加载数据...',
			'processing':'后台正在拼命处理请求...',
			'paginate': {
				'previous':'前一页',
				'next':'下一页'
			},
			'search': '搜索',
			'lengthMenu': '每页 _MENU_ 条记录',
			'info': '当前页为 _PAGE_ 共 _PAGES_ 页，记录数为 _TOTAL_',
			'infoEmpty':'没有找到记录'
		},
		"order":[],
		"orderFixed": [1, 'desc'],
		'ajax': {
			"url":'/manage/question/serverside',
			"type":"post",
			"data": function(d){
				// d.group = $('#group').val();
				// d.position = $('#position').val();
				// d.startdate = $('#startdate').val();
				// d.enddate = $('#enddate').val();
				// d.emergent = $('#emergent').val();
				// d.important = $('#important').val();
			}
		},
		initComplete: function(settings, data){
			// settings.bServerSide = false;
			// console.log( data );
		},
		'columns':[
		    {
			    "class":"details-control",
			    "data-toggle":"modal",
			    "orderable":false,
			    "data":null,
			    "defaultContent":"",
			    "width":"2px",
			    "createdCell":function(td,cellData,rowData,row,col){
					// $(td).attr('data-toggle', 'modal');
					// $(td).attr('data-target', '#event_modal');
					$(td).attr('data-id', rowData.id);
					// $(td).attr('data-isimportant',rowData.isimportant);
			    }
			},
			{"orderable":false,"data":"event_date"},
			{"orderable":false,"data":"groupAndPosition"},
			{"orderable":false,"data":"systemname"},
			{"orderable":false,"data":"events_detail"},
			{"orderable":false,"data":"event_memo"},
			{
				"class":"operation-control",
				"orderable":false,
				"data":"operation",
				"defaultContent":""
			}
		]		
	});
});
</script>