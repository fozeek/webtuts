<?php 
	partial("header", array("header" => "content", "title" => null)); 
?>
<script type="text/javascript">
	var url = '<?= Router::getUrl("content", "listeajax") ?>';
</script>
<div style="clear: both;height: 1px;background: #E5E5E5;">
</div>		
<div id="search-node" style="float: right;cursor: pointer;position: relative;padding: 9px;border-left: 1px solid #E5E5E5;color: #232323;border-bottom: 1px solid #ccc;background: #f8f8f8;">
	<input id="node-value" type="hidden" value="" />
	<span id="node-show">Nodes</span><span id="node-delete" style="display: none;color: #3F6EC2;margin-left: 5px;">x</span>
	<div style="display: none;position: absolute;bottom: 0px;right: 0px;height: 0px;width: 0px;z-index: 10;">
		<div style="position: relative;width: 0px;height: 0px;">
			<div style="position: absolute;top: 0px;right: 0px;min-width: 200px;border-top: 1px solid #E5E5E5;background: white;box-shadow: 0px 3px 5px #ccc;">
			<?php $bundles = get_object_vars(Config::read("bundle")); foreach ($bundles["content"]->tables as $key => $value) : ?>	
				<div class="node-button" data-node="<?= $value ?>" style="padding: 5px;font-size: 0.8em;padding-left: 9px;border-bottom: 1px solid #E5E5E5;">
					<?= ucfirst($value) ?>
				</div>
			<?php endforeach; ?>
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
<?php foreach($tutorials as $tutorial) : ?>
		<a class="itemlist" href="<?= Router::getUrl("content", "show", array("node" => $tutorial->getName(), "id" => $tutorial->get("id")), false); ?>">
			<div style="overflow: hidden;max-height: 40px;position: relative;">	
				<div style="position: absolute;top: -10px;right: 0px;font-size: 2.9em;opacity: 0.1;">
					<?= strtoupper($tutorial->getName()) ?>
				</div>
				<?= $tutorial->get("title"); ?>
				<br />
				<span style="font-size: 0.8em;color: grey;">
					<?= strip_tags($tutorial->get("text")); ?>
				</span>
			</div>
			<div style="clear: both;">
			</div>
		</a>
<?php endforeach; ?>
</div>
<div id="no-match-message" style="<?php if(count($tutorials)>0) : ?>display: none;<?php endif; ?>font-size: 2.9em;opacity: 0.1;text-align: center;margin-top: 40px;">
	No match found !
</div>
<?php partial("footer"); ?>