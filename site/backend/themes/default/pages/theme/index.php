<?php 
	partial("header", array("header" => "theme", "title" => "Themes")); 
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

<?php partial("footer"); ?>