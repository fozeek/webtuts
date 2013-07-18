<!-- News page -->


<div id="actualite-page">
    <div class="middle-column">
	<div class="border-big-title">
	    <h1 class="left-title big-title">
		<?php echo $news->get("title"); ?>
	    </h1>
	    <div class="cl"></div>
	</div>
	
	<div class="article-content">
	    <h4>
		<span class="date"><?php echo PUBLISHED . " " . format_date($news->get("date")); ?></span>
		<span class="date"><?php echo BY; ?></span>
		<span class="author"><a href="<?php echo Router::getUrl("user", "profil", array("user" => $news->get("author")->get("pseudo"))); ?>"><?php echo $news->get("author")->get("pseudo"); ?></a></span>
	    </h4>
	    <div class="article-tags right">

		
	    </div>
	    <div class="cl"></div>
	    <p>
		<?php echo nl2br($news->get("text")); ?>
	    </p>
	</div>
	
	<div id="ancre-comments" class="article-comments">

	</div>
    </div>
</div>