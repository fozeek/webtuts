<?php 
	partial("header", array("header" => "user", "title" => null)); 
?>
<div id="list" style="padding: 20px;padding-top: 0px;">
<?php foreach ($users as $key => $content) : ?>
<div class="itemlist show-content" data-id="<?= strtoupper($content->get("id")) ?>" data-node="<?= $content->getName() ?>" style="cursor: pointer;">
	<div style="overflow: hidden;max-height: 40px;position: relative;">	
		<span style="<?php if($content->get("deleted")) : ?>color: red;<?php endif; ?>">
			<?= strip_tags((isset($query) && $query) ? preg_replace('/('.$query.')/i', '<span style="background: yellow;border-radius: 2px;">$0</span>', $content->get("title")) : $content->get("title")); ?>
		</span>
		<br />
		<span style="font-size: 0.8em;color: grey;">
			Inscrit le <span style="color: black;"><?= strip_tags(substr($content->get("date"), 0, 500)); ?></span>
		</span>
	</div>
	<div style="clear: both;">
	</div>
</div>
<?php endforeach; ?>
</div>

<?php partial("footer"); ?>