<div class="title-box">
	<div class="button" id="update-content" data-id="<?= $content->get("id") ?>" data-node="<?= $content->getName() ?>">Save</div>
	<div class="button-grey" id="<?php if($content->get("deleted")): ?>restore<?php else: ?>remove<?php endif; ?>-content" data-id="<?= $content->get("id") ?>" data-node="<?= $content->getName() ?>"><?php if($content->get("deleted")): ?>Restore<?php else: ?>Remove<?php endif; ?></div>
	<div id="content-title" class="title-text content-editable" style="overflow: hidden;" contentEditable="true"><?= $content->get("title") ?></div>
</div>
<div class="corps-border">
	<div class="corps">
		<div id="content-text" class="content content-editable" contentEditable="true"><?= $content->get("text") ?></div>
	</div>
</div>