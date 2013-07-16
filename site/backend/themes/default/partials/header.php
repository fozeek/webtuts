<!DOCTYPE html>
<html>
    <head>
	<?php partial("meta", compact("type", "name")); ?>
	<title>Page d'accueil Webtuts</title>
	<script></script>
    </head>
    <body>
	<div id="sub-panel">
	</div>
	<div id="panel">
	    <div class="box">
		<div class="html">
		</div>
		<div class="loader" style="display: none;padding: 1px;background: rgba(0,0,0,0.1);border-radius: 2px;">
		    <div style="background: white;padding-top: 40px;padding-bottom: 40px;">
			<div class="loader-img" style="margin: auto;background: url(<?php imageTheme("loader.png"); ?>) center center no-repeat;">
			</div>
		    </div>
		</div>
	    </div>
	    <div style="clear: both;height: 1px;width: 1px;">
	    </div>
	</div>
	<div id="header">
	    <div id="compte-button" style="float: right;height: 40px;cursor: pointer;position: relative;cursor: pointer;text-shadow: 0px 1px #8f97a6;color: #414a5c;">
		<div style="font-weight: bold;text-align: center;padding-top: 13px;padding-left: 15px;padding-right: 15px;font-size: 0.8em;">
		    Fozeek
		</div>
		<div class="panel" style="display: none;position: absolute;bottom: 0px;right: 0px;">
		    <div style="position: relative;">
			<div style="position: absolute;top: 5px;right: 5px;background: white;min-width: 200px;border: 1px solid #414a5c;font-size: 0.8em;border-radius: 2px;box-shadow: 0px 1px 5px grey;">
			    <a href="<?= Router::getUrl("home", "gofrontend"); ?>">
			    	<div style="color: #414a5c;padding: 5px;padding-left: 5px;text-align: center;border-bottom: 1px solid #E5E5E5;">
					Aller au site
				    </div>
				</a>
			    <div style="color: #414a5c;padding: 5px;padding-left: 5px;text-align: center;">
				Se déconnecter
			    </div>
			</div>
			<div style="position: absolute;width: 20px;height: 11px;top: -4px;right: 28px;background: url(/site/backend/themes/default/images/arrow-panel.png) center center no-repeat;">
			</div>
		    </div>
		</div>
	    </div>
	    <div id="compte-button-border-1" class="menu-top-1" style="float: right;">
	    </div>
	    <div id="compte-button-border-2" class="menu-top-2" style="float: right;">
	    </div>
	    <div style="height: 40px;float: left;width: 250px;">
		<div style="color: #414a5c;text-shadow: 0px 1px #8f97a6;font-weight: bold;text-align: center;padding-top: 12px;">
		    Webtuts CMS
		</div>
	    </div>
		<div class="menu-top-1">
	    </div>
	    <div class="menu-top-2">
	    </div>
	    <div id="manage-nodes" style="height: 40px;float: left;cursor: pointer;">
		<div style="color: #414a5c;text-shadow: 0px 1px #8f97a6;font-weight: bold;text-align: center;padding-top: 13px;padding-left: 15px;padding-right: 15px;font-size: 0.8em;">
		    Content manager
		</div>
	    </div>
	    <div class="menu-top-1">
	    </div>
	    <div class="menu-top-2">
	    </div>
	    <div class="add" data-bundle="content" style="height: 40px;float: left;cursor: pointer;">
		<div style="color: #414a5c;text-shadow: 0px 1px #8f97a6;font-weight: bold;text-align: center;padding-top: 13px;padding-left: 15px;padding-right: 15px;font-size: 0.8em;">
		    Add a content
		</div>
	    </div>
	    <div class="menu-top-1">
	    </div>
	    <div class="menu-top-2">
	    </div>
	    <div class="add" data-bundle="taxonomy" style="height: 40px;float: left;cursor: pointer;">
		<div style="color: #414a5c;text-shadow: 0px 1px #8f97a6;font-weight: bold;text-align: center;padding-top: 13px;padding-left: 15px;padding-right: 15px;font-size: 0.8em;">
		    Add a taxonomy
		</div>
	    </div>
	    <div class="menu-top-1">
	    </div>
	    <div class="menu-top-2">
	    </div>
	    <div class="add-selected-node" data-node="user" style="height: 40px;float: left;cursor: pointer;">
		<div style="color: #414a5c;text-shadow: 0px 1px #8f97a6;font-weight: bold;text-align: center;padding-top: 13px;padding-left: 15px;padding-right: 15px;font-size: 0.8em;">
		    Add an user
		</div>
	    </div>
	    <div class="menu-top-1">
	    </div>
	    <div class="menu-top-2">
	    </div>
	</div>
	<div style="z-index: 50;position: fixed;top: 0px;left: 0px;height: 100%;width: 251px;background: #d6d8de;">
	    <div style="height: 41px;">
	    </div>
	    <div style="position: absolute;right: 0px;top: 0px;width: 1px;height: 100%;background: rgba(152, 148, 193, 0.6);">
	    </div>
	    <div style="overflow: auto;height: 100%;">
		<a href="<?php echo Router::getUrl("content", "list", array("type" => "bundle", "name" => "content")); ?>" style="color: none;">
		    <div class="menu-onglet<?php if ($header == "content") { ?>-active<?php } ?>">
			Content
		    </div>
		</a>
		<a href="<?php echo Router::getUrl("content", "list", array("type" => "bundle", "name" => "taxonomy")); ?>">
		    <div class="menu-onglet<?php if ($header == "taxonomy") { ?>-active<?php } ?>">
			Taxonomy
		    </div>
		</a>
		<a href="<?php echo Router::getUrl("content", "list", array("type" => "user")); ?>">
		    <div class="menu-onglet<?php if ($header == "user") { ?>-active<?php } ?>">
			Users
		    </div>
		</a>
		<a href="<?php echo Router::getUrl("content", "list", array("type" => "comment")); ?>">
		    <div class="menu-onglet<?php if ($header == "comment") { ?>-active<?php } ?>">
			Comments
		    </div>
		</a>
		<a href="<?php echo Router::getUrl("parameters", "index"); ?>">
		    <div class="menu-onglet<?php if ($header == "parameters") { ?>-active<?php } ?>">
			Paramêtres
		    </div>
		</a>
	    </div>
	</div>
	<?php if ($title !== null) : ?>
    	<div style="z-index: 25;opacity: 0.8;position: fixed;left: 251px;top: 41px;width: 100%;border-top: 1px solid #d1d5dd;border-bottom: 1px solid #c7cbd4;padding: 10px;padding-left: 15px;font-size: 0.8em;font-weight: bold;color: #888793;
    	     background: #e0e2e7; /* Old browsers */
    	     background: -moz-linear-gradient(top,  #e0e2e7 0%, #f3f4f7 100%); /* FF3.6+ */
    	     background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e0e2e7), color-stop(100%,#f3f4f7)); /* Chrome,Safari4+ */
    	     background: -webkit-linear-gradient(top,  #e0e2e7 0%,#f3f4f7 100%); /* Chrome10+,Safari5.1+ */
    	     background: -o-linear-gradient(top,  #e0e2e7 0%,#f3f4f7 100%); /* Opera 11.10+ */
    	     background: -ms-linear-gradient(top,  #e0e2e7 0%,#f3f4f7 100%); /* IE10+ */
    	     background: linear-gradient(to bottom,  #e0e2e7 0%,#f3f4f7 100%); /* W3C */
    	     filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0e2e7', endColorstr='#f3f4f7',GradientType=0 ); /* IE6-9 */
    	     ">
    	    <div style="opacity: 1;">
		    <?php echo $title ?>
    	    </div>
    	</div>
	<?php endif; ?>
	<div id="page">
	    <div style="position: relative;">
		<div style="float: left;width: 251px;background: #d6d8de;position: relative;">
		    test
		</div>
		<div style="overflow: hidden;background: #eff1f4;margin-top: <?php if ($title !== null) : ?>79<?php else : ?>41<?php endif; ?>px;">



		    <div style="padding: 0px;">












