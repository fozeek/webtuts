<?php 
	partial("header", array("header" => "parameters", "title" => null)); 
?>
<div style="clear: both;height: 1px;background: #E5E5E5;">
</div>
<div style="padding: 20px;">

	<?= $this->Form->start(array("name" => "ParamsForm")); ?>
		<div style="margin-bottom: 20px;">
			<div style="float: left;width: 200px;padding: 5px;">
				Blog Title
			</div>
			<div style="overflow: hidden;">
				<?= $this->Form->input("title", array("value"=>$this->Params->getParam("title"))); ?>
			</div>
			<div style="clear: both;">
			</div>
		</div>
		<div style="margin-bottom: 20px;">
			<div style="float: left;width: 200px;padding: 5px;">
				Description
			</div>
			<div style="overflow: hidden;">
				<?= $this->Form->input("description", array("value"=>$this->Params->getParam("description"))); ?>
			</div>
			<div style="clear: both;">
			</div>
		</div>
		<div style="margin-bottom: 20px;">
			<div style="float: left;width: 200px;padding: 5px;height: 10px;">
			</div>
			<div style="overflow: hidden;">
				<?= $this->Form->submit("Save"); ?>
			</div>
			<div style="clear: both;">
			</div>
		</div>
		
	<?= $this->Form->end() ?>

</div>

<?php partial("footer"); ?>