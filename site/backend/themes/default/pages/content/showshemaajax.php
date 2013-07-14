<div style="background: #F9F9F9;border-bottom: 1px solid #E5E5E5;padding: 20px;font-size: 1.2em;">
	<?= ucfirst($name) ?>
</div>

<?php foreach ($shema as $key => $value) : ?>
	<div style="padding: 20px;width: 150px;float: left;">
		<?= $value["Field"] ?>
	</div>
	<div style="overflow: hidden;padding: 20px;font-size: 0.8em;color: grey;">
		<div style="width: 150px;float: left;">
			<span style="color: grey;">Type</span>
		</div>
		<div style="overflow: hidden;">
			<span style="color: black;"><?= $value["Type"] ?></span>
		</div>
		<?php if(is_array($value["Link"])) : ?>
		<div style="clear: both;height: 10px;">
		</div>
		<div style="width: 150px;float: left;">
			<span style="color: grey;">Link</span>
		</div>
		<div style="overflow: hidden;">
			<span style="color: black;"><?= $value["Link"]["link"] ?></span> <span style="color: grey;font-size: 0.8em;">to</span> <span style="color: black;"><?= $value["Link"]["reference"] ?></span>
		</div>
		<?php endif ?>
		<div style="clear: both;">
		</div>
	</div>
	<div style="clear: both;">
	</div>
<?php endforeach ?>