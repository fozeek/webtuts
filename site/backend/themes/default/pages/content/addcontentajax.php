<div class="title-box">
	<div class="button" id="save-content">Save</div>
	<div class="button-grey" id="cancel-new-content">Cancel</div>
	<div id="content-title" class="title-text" style="overflow: hidden;">Add a <?= $node ?></div>
</div>
<div class="corps-border">
	<div class="corps">
		<?= $this->Form->start(array("name" => "addContentForm")); ?>
		<?= $this->Form->getFormNewHiddenElements($table); ?>
		<?php foreach ($this->Form->getFormNewElements($table) as $key => $input) : ?>
			<div style="padding: 20px;">
				<div style="width: 200px;float: left;">
					<?= ucfirst($key) ?>
				</div>
				<div style="overflow: hidden;">
					<?= $input ?>
				</div>
				<div style="clear: left;">
				</div>
			</div>
		<?php endforeach; ?>
		<?= $this->Form->end() ?>
	</div>
</div>