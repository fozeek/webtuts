<!-- Tag page -->
<?php
    $nb_tag = count($tag_target->get("tutorials"));
?>
<div id="tag-page">
    <div class="middle-column">
	<h1 class="left-title">
	    <span class="black"><?php echo TAG . " :</span> " . $tag_target->get("title"); ?>
	</h1>
	<div class="cl"></div>
	
	<div class="content-container" style="padding-top: 20px;">
	    <?php
		$articles_tag = $tag_target->get("tutorials");
		if(count($articles_tag) > 0){
		    foreach ($tag_target->get("tutorials") as $article){
			$url_image = get_url_image($article);

			include(_theme_path_ . "partials/bigArticlePreview.php");
		    }
		}
		else {
		    echo "<h2>" . NO_ARTICLE_CATEGORY . "</h2>";
		}
	    ?>
	</div>
	
	<aside>
	    <!-- Tags -->
	    <div class="border-title">
		<h3 class="right-title"><?php echo TAGS_WORD; ?></h3>
	    </div>
	    
	    <div id="news-box" class="aside-box">
		<?php
		    foreach($tags as $tag_temp) {
			if($tag_temp->get("title") == $tag_target->get("title"))
			    continue;
			
			$nb_articles = count($tag_temp->get("tutorials"));
		?>
			<a href="<?php echo Router::getUrl("blog", "tag", array("tag" => $tag_temp->get("title"), "id" => $tag_temp->get("id"))); ?>" class="article-tag">
			    <?php echo $tag_temp->get("title"); ?>
			    <span class="right"><?php echo $nb_articles; ?></span>
			</a>
		<?php
		    }
		?>

		<div class="marginAuto">
		    <div class="button big-button">
			<span>
			    <a href="<?php echo Router::getUrl("blog", "tags");?>"><?php echo SEE_TAGS; ?></a>
			</span>
		    </div>
		</div>
	    </div>
	</aside>
	
	<div class="cl"></div>
    </div>
</div>