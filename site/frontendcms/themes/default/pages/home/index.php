<?php 
	partial("header", array("view" => $this)); 
?>

<?php foreach ($contents as $content): ?>
<?php if(!$content->get("deleted")) : ?>
<div style="margin-bottom: 20px;">
	<div style="float: left;width: 200px;height: 150px;background: #E5E5E5 url(<?= $content->get("image"); ?>) center center no-repeat;">
	</div>
	<div style="overflow: hidden;padding: 10px;">
		<a style="font-size: 1.4em;" href="<?= Router::getUrl("content", "show", array("object" => $content->getName(), "id" => $content->get("id"))) ?>"><?= $content->get("title"); ?></a> le <?= printDate($content->get("date")); ?>
		<div style="border-left: 2px solid #ccc;padding: 5px;margin-top: 15px;"><?= $content->get("text"); ?></div>
	</div>
	<div style="clear: both;">
	</div>
</div>
<?php endif ?>
<?php endforeach ?>

<a href="<?= Router::getUrl("home", "index", array("page" => $page-1)); ?>">Page précédente</a> - <a href="<?= Router::getUrl("home", "index", array("page" => $page+1)); ?>">Page suivante</a>

<?php 
	partial("footer"); 
?>