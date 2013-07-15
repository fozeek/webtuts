<?php 
	partial("header", array("view" => $this)); 
?>

<div style="margin-bottom: 20px;">
	<div style="float: left;width: 200px;height: 150px;background: #E5E5E5 url(<?= $content->get("image"); ?>) center center no-repeat;">
	</div>
	<div style="overflow: hidden;padding: 10px;">
		<a style="font-size: 1.4em;" href="<?= Router::getUrl("content", "show", array("object" => $content->getName(), "id" => $content->get("id"))) ?>"><?= $content->get("title"); ?></a> le <?= printDate($content->get("date")); ?>
		<div style="border-left: 2px solid #ccc;padding: 5px;margin-top: 15px;margin-bottom: 15px;"><?= $content->get("text"); ?></div>
		<?php if ($content->get("tags")): ?>
			Tags : 
			<?php foreach ($content->get("tags") as $value): ?>
				<div style="display: inline-block;border: 1px solid #E5E5E5;font-size: 0.8em;padding: 3px;border-radius: 4px;margin-right: 5px;">
					<?= $value->get("title") ?>
				</div>
			<?php endforeach ?>
		<?php endif ?>
		<?php if ($content->get("comments")): ?>
		COMMENTS
		<?php endif ?>
	</div>
	<div style="clear: both;">
	</div>
</div>

<?php 
	partial("footer"); 
?>