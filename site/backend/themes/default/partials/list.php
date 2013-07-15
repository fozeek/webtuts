<?php if(count($contents)>0) : $tmpDate = null; $countDeleted = 0 ; ?>
	<?php foreach($contents as $content) : 
		
		if($content->exists("date")) {

		$newDate = tmpDate($content->get("date"));
		if($tmpDate===null) {
			$tmpDate = $newDate; $tmpRealDate = $content->get("date"); ob_start(); 
		}
		else {
			if($tmpDate != $newDate) {
				$flush = ob_get_clean();
	?>
	<div style="position: relative;padding: 5px;padding-left: 20px;padding-right: 20px;text-align: center;font-size: 0.9em;color: #333;border-bottom: 1px solid #E5E5E5;">
		<?php if($countDeleted > 0) : ?>
		<div class="show-deleted-content" data-date="<?= $tmpRealDate ?>" style="position: absolute;top: 0px;right: 0px;padding: 5px;">
			<?= $countDeleted ?> deleted
		</div>
		<?php endif; ?>
		<?= printDate($tmpRealDate, 1) ?>
	</div>
	<?php $countDeleted = 0; $tmpDate = $newDate; $tmpRealDate = $content->get("date"); echo $flush; ob_start(); }  } ?>
	
	<?php } ?>


	<?php if(!$content->get("deleted")) : ?>
	<div class="itemlist show-content" data-id="<?= strtoupper($content->get("id")) ?>" data-node="<?= $content->getName() ?>" style="cursor: pointer;">
		<div style="overflow: hidden;max-height: 40px;position: relative;">	
			<div style="position: absolute;top: -10px;right: 0px;font-size: 2.9em;opacity: 0.1;">
				<?= strtoupper($content->getName()) ?>
			</div>
			<span style="<?php if($content->get("deleted")) : ?>color: red;<?php endif; ?>">
				<?= strip_tags((isset($query) && $query) ? preg_replace('/('.$query.')/i', '<span style="background: yellow;border-radius: 2px;">$0</span>', $content->get("title")) : $content->get("title")); ?>
			</span>
			<?php if($content->get("date")) : ?>
			<span style="font-size: 0.8em;color: #333;">
				at <?= printDate($content->get("date"), 2); ?>
			</span>
			<?php endif ?>
			<br />
			<span style="font-size: 0.8em;color: grey;">
				<?= strip_tags(substr($content->get("text"), 0, 500)); ?>
			</span>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php else: $countDeleted++; endif; ?>
	<?php endforeach; ?>
	<?php if($content->exists("date")) { ?>
	<?php $flush = ob_get_clean(); ?>
	<div style="position: relative;padding: 5px;padding-left: 20px;padding-right: 20px;text-align: center;font-size: 0.9em;color: #333;border-bottom: 1px solid #E5E5E5;">
		<?php if($countDeleted > 0) : ?>
		<div class="show-deleted-content" data-date="<?= $tmpRealDate ?>" style="position: absolute;top: 0px;right: 0px;padding: 5px;">
			<?= $countDeleted ?> deleted
		</div>
		<?php endif; ?>
		<?= printDate($tmpRealDate, 1) ?>
	</div>
	<?= $flush; ?>
	<?php } ?>
<?php else: ?>
<div id="no-match-message" style="<?php if(count($contents)>0) : ?>display: none;<?php endif; ?>font-size: 2.9em;opacity: 0.1;text-align: center;margin-top: 40px;">
	No match found !
</div>
<?php endif; ?>