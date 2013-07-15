<?php 
	partial("header", array("view" => $this)); 
?>

<?= $this->Form->start(array("name" => "addUserForm")); ?>
<?= $this->Form->getFormHiddenElements($user); ?>
<?php foreach ($this->Form->getFormElements($user) as $key => $input) : ?>
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
<?= $this->Form->submit("Update it !"); ?>
<?= $this->Form->end() ?>

<?php 
	partial("footer"); 
?>