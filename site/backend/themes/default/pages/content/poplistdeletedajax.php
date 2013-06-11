<div class="title-box">
	<div id="content-title" class="title-text">Deleted content on <?= printDate($date, 1) ?></div>
</div>
<div class="corps-border">
	<div id="search-node-deleted" style="float: right;cursor: pointer;position: relative;padding: 9px;border-left: 1px solid #E5E5E5;color: #232323;border-bottom: 1px solid #ccc;background: #f8f8f8;">
		<input id="node-value-deleted" type="hidden" value="<?php if($node): echo $node; endif; ?>" />
		<div style="padding-right: 16px;background: url(<?= imageTheme("arrow-node.jpg") ?>) right center no-repeat;">
			<span id="node-show-deleted"><?php if($node): echo $node; else: ?>Nodes<?php endif; ?></span><span id="node-delete-deleted" style="<?php if(!$node): ?>display: none;<?php endif; ?>color: #3F6EC2;margin-left: 5px;">x</span>
		</div>
		<div id="node-list-deleted" style="display: none;position: absolute;bottom: -3px;right: 3px;height: 0px;width: 0px;z-index: 50;">
			<div style="position: relative;width: 0px;height: 0px;">
				<div style="position: absolute;top: 0px;border-radius: 2px;right: 0px;min-width: 200px;border-top: 1px solid rgba(209,209,209,0.4);border: 1px solid rgba(209,209,209,0.2);border-bottom: none;background: white;box-shadow: 0px 1px 3px #ccc;">
				<?php $bundles = Bundles::getBundle("content"); foreach ($bundles["tables"] as $key => $value) : ?>	
					<div class="node-button-deleted" data-node="<?= $value ?>" style="padding: 5px;padding-left: 9px;border-bottom: 1px solid #E5E5E5;">
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