<?php
    $urlArticle = Router::getUrl("blog", "article", array("category" => $article->get("category")->get("slug"), "article" => $article->get("slug"), "id" => $article->get("id")));
?>

<div class="one-news">
    <div class="border-title">
	<h4 class="left-title">
	    <a href="<?php echo $urlArticle; ?>"><?php echo $article->get("title"); ?></a> - 
	    <span class="date"><?php echo THE . " " . format_date($article->get("date")); ?></span>
	</h4>
    </div>

    <p>
	<?php echo short_description($article->get("text"), 140); ?>
    </p>
    <div class="news-footer">
	<p class="show-more">
	    [...] <a href="<?php echo $urlArticle;?>"><?php echo SEE_MORE; ?></a>
	</p>
	<p class="comment">
	    <?php 
		$nb_comment = count($article->get("comments"));
		$text_comment = ($nb_comment > 1 ? COMMENTS : COMMENT);
	    ?>
	    <a href="<?php echo $urlArticle; ?>#ancre-comments"><?php echo $nb_comment . " " . $text_comment; ?></a>
	</p>
	<div class="cl"></div>

    </div>
</div>