<div class="title-box">
	<div id="content-title" class="title-text">Choose a node</div>
</div>
<div class="corps-border">
	<div class="corps">
		<?php $bundles = Bundles::getBundle("content"); foreach ($bundles["tables"] as $key => $value): ?>
			<div class="add-selected-node" data-node="<?= $value ?>" style="text-align: center;cursor: pointer;font-size: 2em;padding: 15px;border-bottom: 1px solid #E5E5E5;margin-bottom: -1px;"><?= $value ?></div>
		<?php endforeach ?>
	</div>
</div>