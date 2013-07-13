<div class="title-box">
	<div id="content-title" class="title-text">Choose a <?= $bundle ?></div>
</div>
<div class="corps-border">
	<div class="corps" style="padding-left: 20px;padding-right: 20px;overflow: hidden;">
		<?php $cpt = 0; $bundles = Bundles::getBundle($bundle); foreach ($bundles["tables"] as $key => $value): ?>
			<div class="add-selected-node itemlist" data-node="<?= $value ?>" <?php if($cpt>=count($bundles["tables"])-1) : ?>style="border-bottom: none;"<?php endif; ?>><?= ucfirst($value) ?></div>
		<?php $cpt++; endforeach ?>
	</div>
</div>