<?php 
	partial("header", array("header" => null, "title" => null)); 
?>
<?php /* ?>
<?= $this->Form->start(); ?>
<?= $this->Form->input("lol", array(
		"value" => "TEXT"
	)); ?>
<?= $this->Form->textarea("lol", "Ecrit là !"); ?>
<br /><br />
<?= $this->Form->radio("radio", "radio 1"); ?>radio 1
<?= $this->Form->radio("radio", "radio 2"); ?>radio 2
<?= $this->Form->radio("radio", "radio 3"); ?>radio 3
<br /><br />
<?= $this->Form->checkbox("checkbox", "checkbox 1"); ?>checkbox 1
<?= $this->Form->checkbox("checkbox", "checkbox 2"); ?>checkbox 2
<?= $this->Form->checkbox("checkbox", "checkbox 3"); ?>checkbox 3
<br /><br />
<?= $this->Form->select("select", array(
		0 => "France",
		8 => "Venezuela",
		3 => "Cambodge",
		4 => "Haiti",
	),
	array(
		"selected" => "3",
		"multiple" => true
	)); ?>
<br /><br />
<?= $this->Form->submit(); ?>
<?= $this->Form->end(); */ ?>


<?php /*
	$header = array("home");
	partial("header"); 
?>

<?php for($cpt=0;$cpt<20;$cpt++) : ?>
	<a class="itemlist" href="#">
		<div style="float: left;margin-right: 20px;background: url(http://lorempixel.com/200/100/) center top no-repeat;border-radius: 4px;">
			<div style="border-radius: 2px;border-bottom: 1px solid #f8f8f8;">
				<div style="width: 197px;height: 74px;border: 1px solid #888793;border-radius: 2px;opacity: 0.5;">
				</div>
			</div>
		</div>
		<div style="overflow: hidden;">	
			Thème <?= $cpt ?><br />
			<span style="font-size: 0.8em;color: grey;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non modi cum sint placeat ex ipsa unde optio totam aspernatur voluptates cumque explicabo iure ea expedita obcaecati ipsam quaerat maxime doloremque.</span>
		</div>
		<div style="clear: both;">
		</div>
	</a>
<?php endfor; ?>

<?php partial("footer");*/ ?>




<?php


/*

foreach(Kernel::$PDO->query("SELECT * FROM category WHERE id=1") as $key => $cats) {
	print_r($cats);
}*/
/*
print_r(Kernel::$PDO->query("SELECT * FROM category WHERE id=1")->fetchObject("Article"));
echo "</pre>";

	echo "<pre>";*/
	/*if(App::getClass("category")->hydrate(array("name" => 35, "description" => 36, "image" => 7))->save())
		echo "did !";
	else
		echo "fail";*/
/*
	print_r(App::getClass("category")->hydrate(array(
		"name" => array(
			"fr" => "TitleFr",
			"en" => "TitleEn"
		), 
		"description" => array(
			"fr" => "DescriptionFr"
		),
		"image" => 7,
		"deleted" => 0
	)));
	echo "<pre>";
	print_r(App::getClassArray("article", array(
		"limit" => 5,
		"where" => array(
				"have" => "category"
		)
	)));
	echo "</pre>";

	print_r(App::getClassArray("category", array(
			"limit" => 5,
			"where" => array(
				"where" => array(
					"nothave" => "category"
				),
				"andwhere" => array(
					"where" => "date >= 10/02/21",
					"andwhere" => "date <= 13/03/21"
				)
			)
		)));*/
	//print_r(App::getTable("article")->getBySanitizeTitle("liste-des-fonctionalites-de-la-class-kernel"));
	/*
	$cat = App::getClass("category", 1);
	$cat->get("name");
	$cat->set(array("image" => 1, "deleted" => "false", "name" => array("fr" => "Intégration", "en" => "Integration")));
	echo "<br />";
	print_r($cat->get("name"));
	*/

	
?>

<?php partial("footer"); ?>