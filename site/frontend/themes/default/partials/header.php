<header>
	<div id="top-header">
		<?php
		    if(Kernel::route("action") != "404" && 
		      (Kernel::route("action") != "compte" || 
		      (Kernel::route("action") == "compte" && !$this->Session->containsKey("first_connection")) ||
		      (Kernel::route("action") == "compte" && $this->Session->containsKey("first_connection") && !$this->Session->get("first_connection")))){
		?>
			<div id="oiseau-anime">
				<img src="<?php echo _theme_path_ . 'images/'; ?>oeuil-oiseau.png" alt="<?php echo ALT_BIRD_EYE; ?>" class="bird-eye" id="left-eye"/>
				<img src="<?php echo _theme_path_ . 'images/'; ?>oeuil-oiseau.png" alt="<?php echo ALT_BIRD_EYE; ?>" class="bird-eye" id="right-eye"/>
			</div>
		<?php
		    }
		?>
		<div id="login-box">
		    <?php /*
			if($this->Auth->getUser() == false) {
		    ?>
			<a href="<?php echo Router::getUrl("user", "connection"); ?>" class="design-button"><?php echo CONNECTION; ?></a>

			<a href="<?php echo Router::getUrl("user", "subscription"); ?>" class="design-button color"><?php echo INSCRIPTION; ?></a>
		    <?php
			}
			else {
		    ?>
			<a href="<?php echo Router::getUrl("user", "profil", array("user" => Router::get("user")->get("pseudo"))); ?>" class="design-button">
				<?php echo MY_PROFILE; ?>
			</a>
			<a href="<?php echo Router::getUrl("user", "compte"); ?>" class="design-button">
				<?php echo MY_ACCOUNT; ?>
			</a>
			<a href="<?php echo Router::getUrl("user", "disconnect"); ?>" class="design-button color">
				<?php echo DECONNECTION; ?>
			</a>
		    <?php
			}*/
		    ?>
		</div>
		<div class="right search-flag-container">
			<div id="flag-box">
				<?php 
				    if(empty($link)) {
					$link["fr"] = "/fr/".Kernel::getUrl();
					$link["en"] = "/en/".Kernel::getUrl();
				    }
				?>
			    <a href="<?php echo $link["fr"];?>">
					<img src="<?php echo _theme_path_ . 'images/'; ?>flag_fr.png" alt="<?php echo ALT_TRANSLATE_FR; ?>" />
					<span class="flag-caption">FR</span>
				</a>
			    <a href="<?php echo $link["en"];?>">
					<img src="<?php echo _theme_path_ . 'images/'; ?>/flag_en.png" alt="<?php echo ALT_TRANSLATE_EN; ?>" />
					<span class="flag-caption">EN</span>
				</a>
			</div>
			
			<div id="search-box">
				<input type="text" value="" class="input-template" placeholder="<?php echo PL_SEARCH; ?>" />
				<input type="submit" value="" class="button-search" />
			</div>
		</div>
		
		<div class="cl"></div>
	</div>
	
	<nav>
		<ul id="left-nav">
			<li><a href="/"><?php echo HOME; ?></a></li>
			<li><a href="<?php echo Router::getUrl("blog", "categories"); ?>"><?php echo CATEGORY; ?></a></li>
			<li><a href="<?php echo Router::getUrl("blog", "articles"); ?>"><?php echo ARTICLE; ?></a></li>			
		</ul>
		
		<div id="logo">
			<a href="/">
				<img src="<?php echo _theme_path_ . 'images/'; ?>logo.png" alt="<?php echo ALT_LOGO; ?>" />
			</a>
		</div>
		
		<ul id="right-nav">
			<li><a href="<?php echo Router::getUrl("blog", "actualites"); ?>"><?php echo NEWS; ?></a></li>
			<li><a href="#"><?php echo SEARCH; ?></a></li>
			<li><a href="<?php echo Router::getUrl("page", "contact"); ?>"><?php echo CONTACT; ?></a></li>			
		</ul>
	</nav>
</header>