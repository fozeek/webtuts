$("document").ready(function() {
	
	$("#compte-button").live("click", function() {
		$(this).find(".panel").toggle();
		$(this).toggleClass("compte-button-active");
		$("#compte-button-border-1").toggleClass("menu-top-1");
		$("#compte-button-border-2").toggleClass("menu-top-2");
		$("#compte-button-border-1").toggleClass("menu-top-3");
		$("#compte-button-border-2").toggleClass("menu-top-4");
	});

	$("#sub-panel").live("click", function() {
		$("#panel").toggle();
		$(this).toggle();
		$("#page").toggleClass("page-fixed");
	});

	$("#add-article").live("click", function() {
		$("#panel").toggle();
		$("#sub-panel").toggle();
		$("#page").toggleClass("page-fixed");
	});

	$("#add-tag").keyup(function(e) { //remplacez {id_img} par l'id de votre image
	    if(e.keyCode == 13 && $(this).attr("value") !="") {
	    	$("#box-tags").html($("#box-tags").html() + "<span class=\"tag\">" + $(this).attr("value") + "</span>");
	   		$(this).attr("value", "");
	    }
	});

	$("#tags-choose").live("click", function() {
		$("#add-tag").focus();
	});

	$('body').keyup(function(e) { //remplacez {id_img} par l'id de votre image
	      if(e.keyCode == 27) {
	   		$("#panel").css("display", "none");
	   		$("#sub-panel").css("display", "none");
	   		$("#page").toggleClass("page-fixed");
	       }
	});

	function closeComment(field){
		field.css("cursor", "pointer");
		field.children(".close").css("display", "none");
		field.removeClass();
		field.addClass("itemlist");
		field.addClass("showmore");
		field.children(".descriptionitem").children(".textcomment").css("display", "none");
		field.children(".titleitem").children("span").css("display", "none");
		field.children(".descriptionitem").find("input").css("display", "none");
	}

	$($(".descriptionitem")).each(function() {
		if($(this).height()>$(this).parent().children(".titleitem").height()) {
			$(this).children(".borderitem").css("display", "block");
			$(this).css("height", $(this).parent().children(".titleitem").height()+15);
			$(this).css("marginBottom", "-15px");
		}
	});
	
	$(".itemlist.showmore").live("click", function(){
		var previous = $(this).parent().children(".open");
		
		closeComment(previous);
		
		$(this).children(".close").css("display", "block");
		$(this).css("cursor", "auto");
		$(this).removeClass();
		$(this).addClass("open");
		$(this).addClass("itemlist");
		$(this).children(".descriptionitem").children(".textcomment").css("display", "block");
		$(this).children(".titleitem").children("span").css("display", "block");
		$(this).children(".descriptionitem").find("input").css("display", "block");
	});
	
	$(".close").live("click", function(){
		var toclose = $(this).parent();
		console.log(toclose);
		closeComment(toclose);
	});	

	// Recherche du content
	$("#search-node").live("click", function(){
		$(this).children("div").toggle();
	});	
	$(".node-button").live("click", function(){
		$("#node-value").attr("value", $(this).data("node"));
		var node = $(this).data("node");
		var node = node[0].toUpperCase() + node.slice(1)
		$("#node-show").text(node);
		$("#node-delete").css("display", "inline");
		$("#search-input").trigger("keyup").focus();
	});
	$("#node-delete").live("click", function(){
		$("#node-value").attr("value", "");
		$("#node-show").text("Nodes");
		$(this).toggle();
		$("#search-input").trigger("keyup").focus();
		return false;
	});
	$("#search-input").keyup(function() {
		$.ajax({
			type : 'post',
			url : url,
			dataType: "json",
			data : {
				'node' : $("#node-value").attr("value"),
				'query' : $("#search-input").attr("value"),
			},
			success : function(data) {
				$("#list").html('');
				if(data.length > 0) {
					$("#no-match-message").css("display", "none");
					$.each(data, function(key, val) {
						$("#list").append('<a class="itemlist" href="' + val.link + '"><div style="overflow: hidden;max-height: 40px;position: relative;">	<div style="position: absolute;top: -10px;right: 0px;font-size: 2.9em;opacity: 0.1;">' + val.name + '</div>' + val.title + '<br /><span style="font-size: 0.8em;color: grey;">' + val.text + '</span></div><div style="clear: both;"></div></a>');
					});
				}
				else
					$("#no-match-message").css("display", "block");
			}
		});
	});

});