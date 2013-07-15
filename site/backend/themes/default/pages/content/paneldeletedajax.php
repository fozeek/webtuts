<div class="title-box">
	<div id="content-title" class="title-text">Deleted content on <?= printDate($date, 1) ?></div>
</div>
<div class="corps-border">
	<div style="overflow: hidden;">
		<input id="search-input-deleted" data-date="<?= $date ?>" value="<?= $query ?>" autofocus="true" autocomplete="off" name="q" type="text" placeholder="Rechercher" style="text-indent: 35px;border-left: none;border-bottom: 1px solid #ccc;padding: 0px;padding-top: 9px;padding-bottom: 9px;border-right: none;border-top: none;margin-bottom: 0px;max-width: 100%;border-radius: 0px;"/>
	</div>
	<div style="clear: both;height: 1px;background: #E5E5E5;">
	</div>
	<div class="corps list-deleted" style="padding-right: 20px;padding-left: 20px;background: #eff1f4;">
		<?php partial("listallofday", compact("contents")); ?>
	</div>
	<div id="loader-deleted" style="display: none;font-size: 2.9em;text-align: center;margin-top: 40px;margin-bottom: 40px;">
		<div class="loader-img" style="margin: auto;background: url(<?= imageTheme("loader.png") ?>) center center no-repeat;">
		</div>
	</div>
</div>