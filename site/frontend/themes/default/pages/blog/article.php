<!-- Article page -->

<div id="article-page">
    <div class="middle-column">
	<div class="border-big-title">
	    <h1 class="left-title big-title">
		<?php echo $article->get("title"); ?>
	    </h1>
	    <div class="cl"></div>
	</div>

	<div class="article-content">
	    <h4>
		<span class="date"><?php echo PUBLISHED . " " . format_date($article->get("date")); ?></span>
		<span class="date"><?php echo BY; ?></span>
		<span class="author"><a href="<?php echo Router::getUrl("user", "profil", array("user" => $article->get("author")->get("pseudo"))); ?>"><?php echo $article->get("author")->get("pseudo"); ?></a></span>
	    </h4>
	    <div class="article-tags right">
		<?php
		foreach ($article->get("tags") as $tag) {
		    ?>
    		<a href="<?php echo Router::getUrl("blog", "tag", array("tag" => $tag->get("title"), "id" => $tag->get("id"))); ?>" class="article-tag">
			<?php echo $tag->get("title"); ?>
    		</a>
		    <?php
		}
		?>
	    </div>
	    <div class="cl"></div>
	    <p>
		<?php echo $article->get("text"); ?>
	    </p>
	</div>

	<br/>
	<div class="fb-like" data-href="http://webtuts.fr/<?php echo Kernel::getUrl(); ?>" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true" data-font="segoe ui"></div>

	<a href="https://twitter.com/share" class="twitter-share-button" data-via="webtuts_fr" data-lang="fr" data-related="webtuts_fr" data-hashtags="piaf">Tweeter</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

	<div id="ancre-comments" class="article-comments">
	    <?php
		$comments_array = $article->get("comments");
		$text_comment = (isset($comments_array) && count($comments_array) > 0 ? COMMENTS_LIST : NO_COMMENT);
	    ?>
	    <h2><?php echo $text_comment; ?></h2>
	    <?php
	    foreach ($article->get("comments") as $comment) {
		$default_image = _theme_path_ . 'images/' . 'article-image.png';
		$image = md5(strtolower(trim($comment->get("author")->get("mail"))));

		$url_image = 'http://www.gravatar.com/avatar/' . $image . '?d=' . urlencode('http://' . $_SERVER['HTTP_HOST'] . $default_image);
		$alt_image = AVATAR . " " . $comment->get("author")->get("pseudo");
		?>
    	    <div class="one-comment">
    		<div class="comment-user-image">
    		    <img src="<?php echo $url_image; ?>" alt="<?php echo $alt_image; ?>" width="100px" />
    		</div>
    		<div class="comment-body">
    		    <div class="comment-header">
    			<span class="author"><a href="<?php echo Router::getUrl("user', 'profil", array("user" => $comment->get("author")->get("pseudo"))); ?>"><?php echo $comment->get("author")->get("pseudo"); ?></a></span>
    			<span class="date"><?php echo PUBLISH . " " . format_date($comment->get("date")); ?></span>
    		    </div>
    		    <p><?php echo $comment->get("text"); ?></p>
    		</div>

    		<div class="cl"></div>
    	    </div>
		<?php
	    }
	    ?>
	    <?php
	    if ($user = $this->Auth->getUser()) {
		$default_image = _theme_path_ . 'images/' . 'article-image.png';
		$image = md5(strtolower(trim($user->get("mail"))));

		$url_image = 'http://www.gravatar.com/avatar/' . $image . '?d=' . urlencode('http://' . $_SERVER['HTTP_HOST'] . $default_image);
		$alt_image = AVATAR . " " . $user->get("pseudo");
		?>
    	    <div class="one-comment" style="background: #f2f2f2;">
    		<div class="comment-user-image">
    		    <img src="<?php echo $url_image; ?>" alt="<?php echo $alt_image; ?>" width="100px" />
    		</div>

    		<div class="comment-body">
    		    <div class="comment-header">
    			<span class="author"><a href="<?php echo Router::getUrl("user", "profil", array("user" => $user->get("pseudo"))); ?>" id="pseudo-text"><?php echo $user->get("pseudo"); ?></a></span>
    		    </div>
    		    <?= $this->Form->start(array("id" => "post-comment")) ?>
    			<textarea class="textarea" placeholder="Votre commentaire ici." name="text" id="message-text"></textarea>
			<input type="hidden" name="_object_name" value="comment" />

    			<div class="cl"></div>
    			<div class="marginAuto">
    			    <div class="button big-button">
    				<span>
    				    <input id="send-comment" type="submit" value="Envoyer" />
    				</span>
    			    </div>
    			</div>
    		    <?= $this->Form->end() ?>
    		</div>

    		<div class="cl"></div>
    	    </div>
		<?php
	    } else {
		echo '<h3>' . HAVE_TO_CONNECT . '</h3>';
	    }
	    ?>

	</div>
    </div>
</div>

<!-- SyntaxHighlighter -->
<script type="text/javascript" src="<?php echo _theme_path_; ?>js/shCore.js"></script>
<script type="text/javascript" src="<?php echo _theme_path_; ?>js/shBrushCss.js"></script>
<script type="text/javascript" src="<?php echo _theme_path_; ?>js/shBrushJScript.js"></script>
<script type="text/javascript" src="<?php echo _theme_path_; ?>js/shBrushXml.js"></script>
<script type="text/javascript" src="<?php echo _theme_path_; ?>js/shBrushPhp.js"></script>

<script type="text/javascript">
     SyntaxHighlighter.all()
</script>