<?php
/**
 * 球场列表页面模板
 * 
 * @version	$Id$
 * @author	shiqiang<cocowool@gmail.com>
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php echo $page_title; ?></title>
	<style type="text/css">
		@import url('/static/lib/yui3.10.0/cssreset/cssreset-min.css');
		@import url('/templates/adm_default/css/public.css');
	</style>
	<style type="text/css">
		html,body { margin:0 auto; }
		#doc3 { padding:20px; }
	</style>
	<script type="text/javascript" src="/static/lib/yui<?php echo $this->config->item('yui_version'); ?>/yui/yui-min.js"></script>
</head>
<body class="yui3-skin-sam">
	<div id="doc3">
		<a href="<?php echo base_url($this->config->item('adm_segment') . '/category/add'); ?>">添加</a>
		<div id="searchTag"></div>
		<div id="tableTag"></div>
		<div id="footer"></div>
		<br />
		<div id="pageTag">
			<div id="pageCon"></div>
		</div>
	</div>
	
	<script type="text/javascript">
		YUI({
			//gallery: 'gallery-2012.09.26-20-36',
			//gallery: 'gallery-2012.08.29-20-10',
			debug: true
		}).use('datatable','io',
				'datasource',
				'datasource-get',
				'datasource-jsonschema',
				'datatable-datasource',
				'json-parse',
				'json-stringify',
				'gallery-datatable-paginator',
				'gallery-paginator-view',
				'model',
				'console',
				'dataschema',
				'slider',
				function(Y){
			
			var myDataSource = new Y.DataSource.IO({
				source : '<?php echo base_url( $this->config->item('adm_segment') . '/category/index'); ?>'
			});
			myDataSource.plug( { fn: Y.Plugin.DataSourceJSONSchema, cfg: {
				schema: {
					resultListLocator:"mydata",
					metaFields: {
						totalItems: 'totalItems',
						itemsPerPage: 'itemsPerPage',
						itemIndexStart: 'itemIndexStart'
					}
				}
			}});
			var table = new Y.DataTable({
			    columns: <?php echo '[' . implode(',', $column) . ']'; ?>,
			    caption: "<?php echo $tblTitle; ?>",
			    scrollable:"y",
			    paginator: new Y.PaginatorView({
					model: new Y.PaginatorModel({ itemsPerPage:10, page: 1 }),
					maxPageLinks: 6,
					pageLinkFiller: '...',
					container: "#pageCon"
			    }).render() ,
			    paginatorResize: true,
			    requestStringTemplate: "/{page}",
			    summary: "Example DataTable showing basic instantiation configuration"
			});
			table.plug(Y.Plugin.DataTableDataSource, { 
				datasource: myDataSource,
				initialRequest: Y.Lang.sub( table.get('requestStringTemplate'), {
					page : table.paginator.model.get('page'),
					itemsPerPage: table.paginator.model.get('itemsPerPage')
				} )
			});

			table.render("#tableTag").showMessage('正在努力加载数据...');
			table.addAttr('selectedRow', { value:null} );
			table.delegate('mouseover', function(e){
				this.set('selectedRow', e.currentTarget);
			}, '.yui3-datatable-data tr', table);
			table.after('selectedRowChange', function(e){
				var tr = e.newVal, last_tr = e.prevVal, rec = this.getRecord(tr);
				if( !last_tr ){
					tr.removeClass('trhighlight');
				}else{
					last_tr.removeClass('trhighlight');
				}
				tr.addClass('trhighlight');
			});
			
		});
	</script>	
</body>
</html>