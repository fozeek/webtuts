<?php 
	partial("header", array("header" => "content", "title" => "Content")); 
?>


<div style="clear: both;height: 1px;background: #E5E5E5;">
		</div>

		
<div id="search-box" style="float: left;padding: 9px;padding-left: 35px;color: #232323;border-bottom: 1px solid #ccc;background: #f8f8f8;">
	Node
</div>
<div style="overflow: hidden;">
		<input id="search-input" type="text" placeholder="Rechercher" style="text-indent: 35px;border-left: none;border-bottom: 1px solid #ccc;padding: 0px;padding-top: 9px;padding-bottom: 9px;border-right: none;border-top: none;margin-bottom: 0px;max-width: 100%;border-radius: 0px;"/>
</div>
<div style="clear: both;height: 1px;background: #E5E5E5;">
		</div>
<div style="padding: 20px;padding-top: 0px;">
		
		<?php for($cpt=0;$cpt<20;$cpt++) : ?>
	<a class="itemlist" href="#">
		
		<div style="overflow: hidden;">	
			Article <?= $cpt ?> <span style="color: #ccc;font-size: 0.8em;"><?php if(rand ( 0, 1 )==0) echo "page"; else echo "tutoriel"; ?></span>
			<br />
			<span style="font-size: 0.8em;color: grey;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non modi cum sint placeat ex ipsa unde optio totam aspernatur voluptates cumque explicabo iure ea expedita obcaecati ipsam quaerat maxime doloremque.</span>
		</div>
		<div style="clear: both;">
		</div>
	</a>
<?php endfor; ?>

</div>

<?php partial("footer"); ?>