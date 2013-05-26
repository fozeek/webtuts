<?php 
	partial("header", array("header" => "content", "title" => null)); 
?>
<div style="margin: auto;width: 700px;">
	<div style="position: relative;margin: 20px;height: 250px;border-radius: 2px;background: #E5E5E5 url(<?= image($tutorial->get("image")); ?>) center center no-repeat;">
		<div style="position: absolute;bottom: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
		</div>
		<div style="position: absolute;top: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
		</div>
		<div style="position: absolute;top: 1px;right: 0px;height: 248px;width: 1px;background: rgba(0,0,0, 0.2);">
		</div>
		<div style="position: absolute;top: 1px;left: 0px;height: 248px;width: 1px;background: rgba(0,0,0, 0.2);">
		</div>
	</div>
	<div style="font-size: 1.2em;margin: 20px;">
		<?= $this->Form->input("titre", array("value" => $tutorial->get("titre"), "placeholder" => "titre")) ?>
	</div>
	<div style="font-size: 0.9em;margin: 20px;color: rgb(77, 77, 77);">
		<?= $this->Form->textarea("titre", array("value" => $tutorial->get("text"))) ?>
	</div>

	<div style="padding: 20px;padding-top: 0px;">
		<?= $this->Form->checkBox("comment_allowed", "comment_allowed") ?> Allow comments
	</div>
</div>
<?php partial("footer"); ?>