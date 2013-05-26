<?php 
	partial("header", array("header" => "content", "title" => null)); 
?>


<div style="clear: both;height: 1px;background: #E5E5E5;">
		</div>
		
<div id="search-box" style="float: left;padding: 9px;padding-left: 35px;color: #232323;border-bottom: 1px solid #ccc;background: #f8f8f8;">
	Node
</div>
<div style="overflow: hidden;">
		<input id="search-input" type="text" placeholder="Rechercher" style="text-indent: 35px;border-left: none;border-bottom: 1px solid #ccc;padding: 0px;padding-top: 9px;padding-bottom: 9px;border-right: none;border-top: none;margin-bottom: 0px;max-width: 100%;border-radius: 0px;"/>
</div>
<div style="clear: both;height: 1px;background: #E5E5E5;">
		</div>
<div style="padding: 20px;padding-top: 0px;">
		
<?php foreach($tutorials as $tutorial) : ?>
	<a class="itemlist" href="<?= Router::getUrl("content", "show", array("id"=>$tutorial->get("id")), false); ?>">
		
		<div style="overflow: hidden;">	
			<?= $tutorial->get("titre"); ?>
			<br />
			<span style="font-size: 0.8em;color: grey;">
				<?= $tutorial->get("text"); ?>
			</span>
		</div>
		<div style="clear: both;">
		</div>
	</a>
<?php endforeach; ?>

</div>

<?php partial("footer"); ?>