<?php 
	partial("header", array("header" => "content", "title" => null)); 
?>
<script type="text/javascript">
	var urlList = '<?= Router::getUrl("content", "listajax") ?>';
	var urlShow = '<?= Router::getUrl("content", "showajax") ?>';
	var urlUpdate = '<?= Router::getUrl("content", "updateajax") ?>';
	var urlPopShowDeleted = '<?= Router::getUrl("content", "poplistdeletedajax") ?>';
	var urlShowDeleted = '<?= Router::getUrl("content", "listdeletedajax") ?>';
	var urlRemoveContent = '<?= Router::getUrl("content", "removecontentajax") ?>';
	var urlRestoreContent = '<?= Router::getUrl("content", "restorecontentajax") ?>';
	var urlAddContentChooseNode = '<?= Router::getUrl("content", "addcontentchoosenodeajax") ?>';
	var urlAddContent = '<?= Router::getUrl("content", "addcontentajax") ?>';
	var urlManageNodes = '<?= Router::getUrl("content", "managenodesajax") ?>';
	var urlAddContent = '<?= Router::getUrl("content", "addcontentajax") ?>';
	var urlAddContentSave = '<?= Router::getUrl("content", "addcontentsaveajax") ?>';
</script>
<div style="clear: both;height: 1px;background: #E5E5E5;">
</div>		
<div id="search-node" style="float: right;cursor: pointer;position: relative;padding: 9px;border-left: 1px solid #E5E5E5;color: #232323;border-bottom: 1px solid #ccc;background: #f8f8f8;">
	<input id="node-value" type="hidden" value="" />
	<div style="padding-right: 16px;background: url(<?= imageTheme("arrow-node.jpg") ?>) right center no-repeat;">
		<span id="node-show">Nodes</span><span id="node-delete" style="display: none;color: #3F6EC2;margin-left: 5px;">x</span>
	</div>
	<div id="node-list" style="display: none;position: absolute;bottom: -3px;right: 3px;height: 0px;width: 0px;z-index: 50;">
		<div style="position: relative;width: 0px;height: 0px;">
			<div style="position: absolute;top: 0px;border-radius: 2px;right: 0px;min-width: 200px;border-top: 1px solid rgba(209,209,209,0.4);border: 1px solid rgba(209,209,209,0.2);border-bottom: none;background: white;box-shadow: 0px 1px 3px #ccc;">
			<?php $bundles = Bundles::getBundle("content"); foreach ($bundles["tables"] as $key => $value) : ?>	
				<div class="node-button" data-node="<?= $value ?>" style="padding: 5px;padding-left: 9px;border-bottom: 1px solid #E5E5E5;">
					<?= ucfirst($value) ?>
				</div>
			<?php endforeach; ?>
				<div id="manage-nodes" style="padding: 5px;">
					<div style="text-align: center;background: #93cd71;background: -moz-linear-gradient(top, #93cd71 0%, #74af67 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#93cd71), color-stop(100%,#74af67));background: -webkit-linear-gradient(top, #93cd71 0%,#74af67 100%);background: -o-linear-gradient(top, #93cd71 0%,#74af67 100%);background: -ms-linear-gradient(top, #93cd71 0%,#74af67 100%);background: linear-gradient(to bottom, #93cd71 0%,#74af67 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cd71', endColorstr='#74af67',GradientType=0 );border-bottom: 1px solid #5e8e54;border-top: 1px solid #dbdde4;color: white;padding: 6px;font-weight: bold;border-radius: 2px;font-size: 0.9em;text-shadow: 0px -1px #71a45e;">
						Manage nodes
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="overflow: hidden;">
	<input id="search-input" autofocus="true" autocomplete="off" name="q" type="text" placeholder="Rechercher" style="text-indent: 35px;border-left: none;border-bottom: 1px solid #ccc;padding: 0px;padding-top: 9px;padding-bottom: 9px;border-right: none;border-top: none;margin-bottom: 0px;max-width: 100%;border-radius: 0px;"/>
</div>
<div style="clear: both;height: 1px;background: #E5E5E5;">
</div>
<div id="list" style="padding: 20px;padding-top: 0px;">
	<?php partial("list", compact("contents", "query")); ?>
</div>
<div id="loader" style="display: none;font-size: 2.9em;text-align: center;margin-top: 40px;margin-bottom: 40px;">
	<div class="loader-img" style="margin: auto;background: url(<?= imageTheme("loader.png") ?>) center center no-repeat;">
	</div>
</div>
<?php partial("footer"); ?>