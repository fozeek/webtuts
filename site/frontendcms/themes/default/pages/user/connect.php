<?php 
	partial("header", array("view" => $this)); 
?>

<?php if (isset($error)): ?>
<div style="color: red;padding :10px;">
	Bad login !
</div>
<?php endif ?>
<?= $this->Form->start(array("name" => "addUserForm")); ?>
<?= $this->Form->input("pseudo"); ?>
<?= $this->Form->input("password", array("type" => "password")); ?>
<?= $this->Form->submit("Sign in"); ?>
<?= $this->Form->end() ?>

<?php 
	partial("footer"); 
?>