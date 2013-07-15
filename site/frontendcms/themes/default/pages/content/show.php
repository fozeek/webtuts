<?php 
	partial("header", array("view" => $this)); 
?>

<?php if(!$content->get("deleted")) : ?>
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
			<br />
		<?php endif ?>
		<br />
		<?php if ($content->exists("comments")): ?>
			<div style="font-size: 1.2em;color: black;">Comments</div>
			<?php if (count($content->get("comments"))>0): ?>
			<?php foreach ($content->get("comments") as $value): ?>
			<div style="border-top: 1px dashed #ccc;">
				<div style="float: left;width: 150px;padding: 10px;">
					<?= $value->get("author")->get("pseudo") ?>
				</div>
				<div style="overflow: hidden;padding: 10px;">
					<?= $value->get("text") ?>
				</div>
				<div style="clear: left;">
				</div>
			</div>
			<?php endforeach ?>
			<?php endif ?>
			<?php if ($this->Auth->getUser()): ?>
			<div style="border-top: 1px dashed #ccc;padding-top: 15px;margin-top: 10px;">
				<?= $this->Form->start(array("name" => "addCommentForm")); ?>
				<?= $this->Form->input("_object_name", array("type" => "hidden", "value" => "comment")) ?>
				<?= $this->Form->input("author", array("type" => "hidden", "value" => $this->Auth->getUser()->get("id"))) ?>
				<?= $this->Form->textarea("text", array("style" => "width: 500px;border: 1px solid #ccc;height: 200px;border-radius: 4px;")) ?>
				<br />
				<?= $this->Form->submit("Comment !"); ?>
				<?= $this->Form->end() ?>
			</div>
			<?php else: ?>
				Vous devez être connecté
			<?php endif ?>
		<?php endif ?>
	</div>
	<div style="clear: both;">
	</div>
</div>
<?php else : ?>
<div style="margin-top: 50px;font-size: 4em;color: grey;text-align: center;">
	This content has been deleted !
</div>
<?php endif ?>

<?php 
	partial("footer"); 
?>