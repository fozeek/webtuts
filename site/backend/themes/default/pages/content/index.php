<?php 
	partial("header", array("header" => "content", "title" => null)); 
?>
<div style="clear: both;height: 1px;background: #E5E5E5;">
</div>		
<div id="search-box" style="float: left;display: none;padding: 9px;padding-left: 35px;color: #232323;border-bottom: 1px solid #ccc;background: #f8f8f8;">
	Node
</div>
<div style="overflow: hidden;">
	<form action="" method="get">
		<input id="search-input" name="q" value="<?= $query ?>" type="text" placeholder="Rechercher" style="text-indent: 35px;border-left: none;border-bottom: 1px solid #ccc;padding: 0px;padding-top: 9px;padding-bottom: 9px;border-right: none;border-top: none;margin-bottom: 0px;max-width: 100%;border-radius: 0px;"/>
	</form>
</div>
<div style="clear: both;height: 1px;background: #E5E5E5;">
</div>
<div style="padding: 20px;padding-top: 0px;">
<?php foreach($tutorials as $tutorial) : ?>
	<a class="itemlist" href="<?= Router::getUrl("content", "show", array("node" => $tutorial->getName(), "id" => $tutorial->get("id")), false); ?>">
		<div style="overflow: hidden;max-height: 40px;position: relative;">	
			<div style="position: absolute;top: -10px;right: 0px;font-size: 2.9em;opacity: 0.1;">
				<?= strtoupper($tutorial->getName()) ?>
			</div>
			<?= $tutorial->get("titre"); ?>
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
<?php partial("footer"); ?>