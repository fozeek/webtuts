<!-- Tags page -->

<div id="tags-page">
    <!-- Tags content -->
    <div class="middle-column">
	<div class="border-title">
	    <h1 class="middle-title">
		<?php echo TAGS_TITLE; ?>
	    </h1>
	</div>
	
	<div id="explanation-text-page">
	    <p><?php echo TAGS_TEXT; ?></p>
	</div>
	
	<?php
	    foreach($tags as $tag_temp) {
		$nb_articles = count($tag_temp->get("tutorials"));
	?>
		<a href="<?php echo Router::getUrl("blog", "tag", array("tag" => $tag_temp->get("title"), "id" => $tag_temp->get("id"))); ?>" class="article-tag">
		    <?php echo $tag_temp->get("title"); ?>
		    <span class="right"><?php echo $nb_articles; ?></span>
		</a>
	<?php
	    }
	?>
    </div>
</div>
