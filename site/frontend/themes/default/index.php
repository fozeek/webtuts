<?php

	 define("_theme_path_", Kernel::path("themes", true) . "default/");
	 include("lang/" . Kernel::getCurrentLang() . ".php");
 	 include("functions.php");

?>
<!DOCTYPE html>
<html>
	<head>
	    <?php
		include("partials/meta.php");
		$end_title = "";
		if(Kernel::route("action") == "category" ||
		   Kernel::route("action") == "article" ||
		   Kernel::route("action") == "actualite" ||
		   Kernel::route("action") == "tag" ||
		   Kernel::route("action") == "profil"){
		   $newUrl = explode("/", Kernel::$URL);
		   $end_title = str_replace("-"," ",end($newUrl));
		   
		}
	    ?>
	    
	    <title><?php echo get_title_from_url(Kernel::route("controller"),Kernel::route("action")) . " " . $end_title; ?></title>
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
		    <?php include("pages/".Kernel::route("controller").'/'.Kernel::route("action").".php"); ?>
		</div>

		<!-- Footer -->
		<?php include("partials/footer.php"); ?>
	    </div>
	</body>
</html>