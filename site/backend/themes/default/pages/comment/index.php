<?php 
	partial("header", array("header" => "comment", "title" => null)); 
?>
<div id="list" style="padding: 20px;padding-top: 0px;">
<?php foreach ($comments as $key => $content) : ?>
<div class="itemlist show-content" data-id="<?= strtoupper($content->get("id")) ?>" data-node="<?= $content->getName() ?>" style="cursor: pointer;">
	<div style="overflow: hidden;max-height: 40px;position: relative;">	
		<span style="<?php if($content->get("deleted")) : ?>color: red;<?php endif; ?>">
			<?= strip_tags((isset($query) && $query) ? preg_replace('/('.$query.')/i', '<span style="background: yellow;border-radius: 2px;">$0</span>', $content->get("text")) : $content->get("text")); ?>
		</span>
		<br />
		<span style="font-size: 0.8em;color: grey;">
			<?= strip_tags(substr($content->get("author")->get("pseudo"), 0, 500)); ?>
		</span>
	</div>
	<div style="clear: both;">
	</div>
</div>
<?php endforeach; ?>
</div>

<?php partial("footer"); ?>