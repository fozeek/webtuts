<?php if(count($contents)>0) : $count = 0 ; ?>
	<?php foreach($contents as $content) : ?>
	<div class="itemlist show-content" data-id="<?= strtoupper($content->get("id")) ?>" data-node="<?= $content->getName() ?>" style="cursor: pointer;<?php if($count==count($contents)-1) : ?>border-bottom: none !important;<?php endif; ?><?php if($count==0) : ?>border-top: none !important;margin-top: 0px !important;<?php endif; ?>">
		<div style="overflow: hidden;max-height: 40px;position: relative;">	
			<div style="position: absolute;top: -10px;right: 0px;font-size: 2.9em;opacity: 0.1;">
				<?= strtoupper($content->getName()) ?>
			</div>
			<span style="<?php if($content->get("deleted")) : ?>color: red;<?php endif; ?>">
				<?= strip_tags((isset($query) && $query) ? preg_replace('/('.$query.')/i', '<span style="background: yellow;border-radius: 2px;">$0</span>', $content->get("title")) : $content->get("title")); ?>
			</span>
			<span style="font-size: 0.8em;color: #333;">
				at <?= printDate($content->get("date"), 2); ?>
			</span>
			<br />
			<span style="font-size: 0.8em;color: grey;">
				<?= strip_tags(substr($content->get("text"), 0, 500)); ?>
			</span>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php $count++; endforeach; ?>
<?php else: ?>
<div id="no-match-message" style="<?php if(count($contents)>0) : ?>display: none;<?php endif; ?>font-size: 2.9em;opacity: 0.1;text-align: center;padding-top: 40px;padding-bottom: 40px;">
	No match found !
</div>
<?php endif; ?>