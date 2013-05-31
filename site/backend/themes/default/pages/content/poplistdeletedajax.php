<div class="title-box">
	<div id="content-title" class="title-text">Deleted content on <?= printDate($date, 1) ?></div>
</div>
<div class="corps-border">
	<div id="search-node-deleted" style="float: right;cursor: pointer;position: relative;padding: 9px;border-left: 1px solid #E5E5E5;color: #232323;border-bottom: 1px solid #ccc;background: #f8f8f8;">
		<input id="node-value-deleted" type="hidden" value="" />
		<span id="node-show-deleted">Nodes</span><span id="node-delete-deleted" style="display: none;color: #3F6EC2;margin-left: 5px;">x</span>
		<div style="display: none;position: absolute;bottom: 0px;right: 0px;height: 0px;width: 0px;z-index: 10;">
			<div style="position: relative;width: 0px;height: 0px;">
				<div style="position: absolute;top: 0px;right: 0px;min-width: 200px;border-top: 1px solid #E5E5E5;background: white;box-shadow: 0px 3px 5px #ccc;">
				<?php $bundles = get_object_vars(Config::read("bundle")); foreach ($bundles["content"]->tables as $key => $value) : ?>	
					<div class="node-button-deleted" data-node="<?= $value ?>" style="padding: 5px;font-size: 0.8em;padding-left: 9px;border-bottom: 1px solid #E5E5E5;">
						<?= ucfirst($value) ?>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
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