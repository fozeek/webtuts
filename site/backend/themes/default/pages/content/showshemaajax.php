<div style="background: #F9F9F9;border-bottom: 1px solid #E5E5E5;padding: 20px;">
	<div class="button" id="delete-type-content" data-name="<?= $name ?>" style="border-radius: 2px;float: right;
background: #93cd71;
background: -moz-linear-gradient(top, #93cd71 0%, #74af67 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#93cd71), color-stop(100%,#74af67));
background: -webkit-linear-gradient(top, #93cd71 0%,#74af67 100%);
background: -o-linear-gradient(top, #93cd71 0%,#74af67 100%);
background: -ms-linear-gradient(top, #93cd71 0%,#74af67 100%);
background: linear-gradient(to bottom, #93cd71 0%,#74af67 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cd71', endColorstr='#74af67',GradientType=0 );
border-bottom: 1px solid #5e8e54;
border-top: 1px solid #dbdde4;
color: white;
padding: 10px;
cursor: pointer;
padding-left: 15px;
padding-right: 15px;
font-size: 0.8em;
font-weight: bold;
text-shadow: 0px -1px #71a45e;margin-top: -8px;">Delete this</div>
	<span style="font-size: 1.2em;"><?= ucfirst($name) ?></span>
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