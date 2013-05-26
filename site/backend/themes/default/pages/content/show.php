<?php 
	partial("header", array("header" => "content", "title" => null)); 
?>
	<div style="position: relative;margin: 20px;height: 250px;background: #F9F9F9 url(http://img.hebus.com/hebus_2012/07/31/1343752964_44072.jpg) center center no-repeat;">
		<div style="position: absolute;bottom: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
		</div>
		<div style="position: absolute;top: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
		</div>
		<div style="position: absolute;top: 1px;right: 0px;height: 248px;width: 1px;background: rgba(0,0,0, 0.2);">
		</div>
		<div style="position: absolute;top: 1px;left: 0px;height: 248px;width: 1px;background: rgba(0,0,0, 0.2);">
		</div>
	</div>
	<div style="font-size: 1.2em;margin: 20px;">
		<?= $tutorial->get("titre"); ?>
	</div>
	<div style="font-size: 0.9em;margin: 20px;text-indent: 15px;color: rgb(77, 77, 77);">
		<?= $tutorial->get("text"); ?>
	</div>

<?php partial("footer"); ?>