<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<link type="text/css" rel="stylesheet" href="<?= Kernel::path("themes", true) ?>default/css/style.css" />
<script src="<?= Kernel::path("themes", true) ?>default/js/jquery.js"></script>
<script src="<?= Kernel::path("themes", true) ?>default/js/tiny_mce/tiny_mce.js"></script>
<script src="<?= Kernel::path("themes", true) ?>default/js/functions.js"></script>

<script type="text/javascript">
	var typeForRefresh = '<?= $type ?>';
	var nameForRefresh = '<?= $name ?>';


	var urlList = '<?= Router::getUrl("content", "listajax") ?>';
	var urlShow = '<?= Router::getUrl("content", "showajax") ?>';
	var urlPanelDeleted = '<?= Router::getUrl("content", "paneldeletedajax") ?>';
	var urlListDeleted = '<?= Router::getUrl("content", "listdeletedajax") ?>';

	var urlManagerNodes = '<?= Router::getUrl("content", "managernodesajax") ?>';
	var urlAddNodeForm = '<?= Router::getUrl("content", "addnodeformajax") ?>';
	var urlAddNodeSave = '<?= Router::getUrl("content", "addnodesaveajax") ?>';
	var urlShowShema = '<?= Router::getUrl("content", "showshemaajax") ?>';
	var urlDeleteNode = '<?= Router::getUrl("content", "deletenodeajax") ?>';

	var urlUpdate = '<?= Router::getUrl("content", "updateajax") ?>';
	var urlRemove = '<?= Router::getUrl("content", "removeajax") ?>';
	var urlRestore = '<?= Router::getUrl("content", "restoreajax") ?>';

	var urlAddChooseBundle= '<?= Router::getUrl("content", "addchoosebundleajax") ?>';
	var urlAddForm = '<?= Router::getUrl("content", "addformajax") ?>';
	var urlAddSave = '<?= Router::getUrl("content", "addsaveajax") ?>';
</script>