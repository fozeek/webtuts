<div class="title-box">
	<div class="button" id="update-content" data-id="<?= $content->get("id") ?>" data-node="<?= $content->getName() ?>">Save</div>
	<div class="button-grey" id="<?php if($content->get("deleted")): ?>restore<?php else: ?>remove<?php endif; ?>-content" data-id="<?= $content->get("id") ?>" data-node="<?= $content->getName() ?>"><?php if($content->get("deleted")): ?>Restore<?php else: ?>Remove<?php endif; ?></div>
	<div id="content-title" class="title-text"  style="overflow: hidden;" ><?= $content->get("title") ?></div>
</div>
<div class="corps-border">
	<div class="corps">
		<?= $view->Form->start(array("name" => "updateContentForm")); ?>
		<?= $view->Form->getFormHiddenElements($content); ?>
		<?php foreach ($view->Form->getFormElements($content) as $key => $input) : ?>
			<div style="padding: 20px;">
				<div style="width: 200px;float: left;">
					<?= ucfirst($key) ?>
				</div>
				<div style="overflow: hidden;">
					<?= $input ?>
				</div>
				<div style="clear: left;">
				</div>
			</div>
		<?php endforeach; ?>
		<?= $view->Form->end() ?>
	</div>
</div>
<script>
    // TINY MCE
    tinyMCE.init({
	// General options
	mode : "specific_textareas",
        editor_selector : "text-editable",
	theme : "advanced",
	plugins : "pre,autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

	// Theme options
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	theme_advanced_fonts : "Andale Mono=andale mono,times;"+
	"Arial=arial,helvetica,sans-serif;"+
	"Arial Black=arial black,avant garde;"+
	"Book Antiqua=book antiqua,palatino;"+
	"Comic Sans MS=comic sans ms,sans-serif;"+
	"Courier New=courier new,courier;"+
	"Georgia=georgia,palatino;"+
	"Helvetica=helvetica;"+
	"Impact=impact,chicago;"+
	"Symbol=symbol;"+
	"Tahoma=tahoma,arial,helvetica,sans-serif;"+
	"Terminal=terminal,monaco;"+
	"Times New Roman=times new roman,times;"+
	"Trebuchet MS=trebuchet ms,geneva;"+
	"Verdana=verdana,geneva;"+
	"Webdings=webdings;"+
	"Segoe ui=Segoe UI light, verdana;"+
	"Ubuntu-c=Ubuntu-C, arial;",

	theme_advanced_font_sizes : "10px,12px,14px,16px,18px,20px,22px,24px",
	extended_valid_elements : "pre",
	preformatted : true,
	valid_elementsEdit : "pre",
	// Skin options
	skin : "o2k7",
	skin_variant : "silver",

	// Example content CSS (should be your site CSS)
	content_css : "css/example.css",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "js/template_list.js",
	external_link_list_url : "js/link_list.js",
	external_image_list_url : "js/image_list.js",
	media_external_list_url : "js/media_list.js",

	// Replace values for the template plugin
	template_replace_values : {
	    username : "Some User",
	    staffid : "991234"
	}
    });
</script>