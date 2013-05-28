<?php 
	partial("header", array("header" => "content", "title" => null)); 
?>
	<div style="font-size: 1.2em;margin: 20px;color: #3F6EC2;" contenteditable="true">
		<?= $tutorial->get("title"); ?>
	</div>
	<div style="font-size: 0.9em;margin: 20px;text-indent: 15px;color: rgb(77, 77, 77);" contenteditable="true">
		<?= nl2br($tutorial->get("text")); ?>
	</div>

	<div style="padding: 20px;">
	<div style="color: #414a5c;padding-bottom: 5px;border-bottom: 1px solid #E5E5E5;">
		<?= count($tutorial->get("comments")); ?> commentaire<? if(count($tutorial->get("comments"))>1) : ?>s<?php endif; ?>
	</div>
	<?php foreach ($tutorial->get("comments") as $comment) : ?>
		<div style="padding: 10px;border-bottom: 1px solid #E5E5E5;font-size: 0.8em;">
			<a href="<?= Router::getUrl("user", "show", array("id" => $comment->get("author")->get("id"))) ?>">
				<div style="position: relative;float: left;margin-right: 10px;height: 50px;width: 50px;background: #E5E5E5 url(<?= $comment->get("author")->getGravatar(50); ?>) center center no-repeat;">
					<div style="position: absolute;bottom: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
					</div>
					<div style="position: absolute;top: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
					</div>
					<div style="position: absolute;top: 1px;right: 0px;height: 48px;width: 1px;background: rgba(0,0,0, 0.2);">
					</div>
					<div style="position: absolute;top: 1px;left: 0px;height: 48px;width: 1px;background: rgba(0,0,0, 0.2);">
					</div>
				</div>
			</a>
			<a href="<?= Router::getUrl("user", "show", array("id" => $comment->get("author")->get("id"))) ?>" style="font-weight: bold;">
				<?= $comment->get("author")->get("pseudo"); ?>
			</a>
			<br />
			<?= $comment->get("text"); ?>
			<div style="clear: both;">
			</div>
		</div>
	<?php endforeach; ?>
	</div>
<?php partial("footer"); ?>