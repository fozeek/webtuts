<?php

	 define("_theme_path_", __themes_dir__ . "default/");
	 include(__library_dir__ . "lang/" . Kernel::get("lang") . ".php");
 	 include("functions.php");

?>
<!DOCTYPE html>
<html>
	<head>
	    <?php
		include("partials/meta.php");
	    //Kernel::get("cache")->inc(_theme_path_."partials/meta.php");
		$end_title = "";
		if(Kernel::get("action") == "category" ||
		   Kernel::get("action") == "article" ||
		   Kernel::get("action") == "actualite" ||
		   Kernel::get("action") == "tag" ||
		   Kernel::get("action") == "profil"){
		   $newUrl = explode("/", Kernel::$URL);
		   $end_title = str_replace("-"," ",end($newUrl));
		   
		}
	    ?>
	    
	    <title><?php echo get_title_from_url(Kernel::get("controler"),Kernel::get("action")) . " " . $end_title; ?></title>
	   </head>
	<body>
	    <div id="fb-root"></div>
	    <script>
		(function(d, s, id) {
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) return;
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	    </script>
	    
	    <div id="global">
		<!-- Header -->
		<?php include("partials/header.php"); ?>

		<!-- Content -->
		<div id="content">
		    <?php include(_theme_path_."pages/".Kernel::get("controler").'/'.Kernel::get("action").".php"); ?>
		</div>

		<!-- Footer -->
		<?php include("partials/footer.php"); ?>
	    </div>
	</body>
</html>