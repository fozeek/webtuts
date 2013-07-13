<div class="title-box">
	<div class="button-grey" id="cancel-new-content">Cancel</div>
	<div id="content-title" class="title-text">Choose a node</div>
</div>
<div class="corps-border">
	<div class="corps">
		<?php $bundles = Bundles::getBundle("content"); foreach ($bundles["tables"] as $key => $value): ?>
			<div class="add-selected-node" data-node="<?= $value ?>" style="text-align: center;font-weight: bold;padding: 25px;border-bottom: 1px solid #E5E5E5;margin-bottom: -1px;"><?= $value ?></div>
		<?php endforeach ?>
	</div>
</div>