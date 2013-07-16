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
		$("#search-input").trigger("keyup").focus();
		$("#panel").find(".box").css("max-width", "1000px");
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
	   		$("#panel").find(".box").css("max-width", "1000px");
	       }
	});

	// Recherche du content
	$("#search-node").live("click", function(){
		$(this).children("div:last").toggle();
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
			url : urlList,
			beforeSend: function() {
				$("#loader").toggle();
				$("#list").html('');
				$("#no-match-message").css("display", "none");
			},
			data : {
				'query' : $("#search-input").attr("value"),
				'type' : typeForRefresh,
				'name' : nameForRefresh
			},
			success : function(data) {
				$("#loader").toggle();
				$("#list").html(data);
			}
		});
	});
	$(".show-content").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlShow,
			beforeSend: function() {
				$("#panel").show();
				$("#sub-panel").show();
				$("#page").addClass("page-fixed");
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			data : {
				'node' : $(this).data("node"),
				'id' : $(this).data("id"),
			},
			success : function(data) {
				$("#panel").find(".loader").toggle();
				$("#panel").find(".html").html(data);
			}
		});
	});
	$(".content-editable").live("click", function() {
		$(this).attr("contentEditable", "true");
		$(this).addClass("content-editable-setted");
		$(this).focus();
	});
	$(".content-editable").live("blur", function() {
		$(this).attr("contentEditable", "false");
		$(this).removeClass("content-editable-setted");
	});
	$("#update-content").live("click", function() {
		var formData = new FormData(document.forms.namedItem("updateContentForm"));

		//console.log(formData);
		$.ajax({
			type : 'post',
			url : urlUpdate,
			processData: false,
    		contentType: false,
			data : formData,
			beforeSend: function() {
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			success : function(data) {
				console.log(data);
				$("#panel").find(".loader").toggle();
				$("#panel").find(".html").html(data);
			}
		});
	});
	$("#save-content").live("click", function() {
		var formData = new FormData(document.forms.namedItem("addContentForm"));

		//console.log(formData);
		$.ajax({
			type : 'post',
			url : urlAddSave,
			processData: false,
    		contentType: false,
			data : formData,
			beforeSend: function() {
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			success : function(data) {
				console.log(data);
				$("#panel").find(".loader").toggle();
				$("#panel").find(".html").html(data);
			}
		});
	});
	$(".add-selected-node").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlAddForm,
			data : {
				'node' : $(this).data("node")
			},
			beforeSend: function() {
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
				$("#panel").find(".box").css("max-width", "1000px");
			},
			success : function(data) {
				$("#panel").show();
				$("#sub-panel").show();
				$("#page").addClass("page-fixed");
				$("#panel").find(".loader").hide();
				$("#panel").find(".html").html(data);
			}
		});
	});
	$(".show-deleted-content").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlPanelDeleted,
			beforeSend: function() {
				$("#panel").toggle();
				$("#sub-panel").toggle();
				$("#page").toggleClass("page-fixed");
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			data : {
				'date' : $(this).data("date"),
				'query' : $("#search-input").attr("value"),
				'node' : $("#node-value").attr("value"),
			},
			success : function(data) {
				$("#panel").find(".loader").toggle();
				$("#panel").find(".html").html(data);
			}
		});
	});

	$("#search-input-deleted").live("keyup", function() {
		$.ajax({
			type : 'post',
			url : urlListDeleted,
			beforeSend: function() {
				$(".list-deleted").html('');
				$("#loader-deleted").show();
			},
			data : {
				'date' : $(this).data("date"),
				'query' : $("#search-input-deleted").attr("value"),
				'node' : $("#node-value-deleted").attr("value"),
			},
			success : function(data) {
				$("#loader-deleted").hide();
				$(".list-deleted").html(data);
			}
		});
	});
	$("#search-node-deleted").live("click", function(){
		$(this).children("div:last").toggle();
	});	
	$(".node-button-deleted").live("click", function(){
		$("#node-value-deleted").attr("value", $(this).data("node"));
		var node = $(this).data("node");
		var node = node[0].toUpperCase() + node.slice(1)
		$("#node-show-deleted").text(node);
		$("#node-delete-deleted").css("display", "inline");
		$("#search-input-deleted").trigger("keyup").focus();
	});
	$("#node-delete-deleted").live("click", function(){
		$("#node-value-deleted").attr("value", "");
		$("#node-show-deleted").text("Nodes");
		$(this).toggle();
		$("#search-input-deleted").trigger("keyup").focus();
		return false;
	});

	$("#remove-content").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlRemove,
			beforeSend: function() {
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			data : {
				'id' : $(this).data("id"),
				'node' : $(this).data("node"),
			},
			success : function(data) {
				$("#panel").find(".loader").toggle();
				$("#panel").find(".html").html(data);
			}
		});
	});

	$("#restore-content").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlRestore,
			beforeSend: function() {
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			data : {
				'id' : $(this).data("id"),
				'node' : $(this).data("node"),
			},
			success : function(data) {
				$("#panel").find(".loader").toggle();
				$("#panel").find(".html").html(data);
			}
		});
	});

	$(".add").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlAddChooseBundle,
			beforeSend: function() {
				$("#panel").toggle();
				$("#sub-panel").toggle();
				$("#page").toggleClass("page-fixed");
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
				$("#panel").find(".box").css("max-width", "400px");
			},
			data : {
				'bundle' : $(this).data("bundle")
			},
			success : function(data) {
				$("#panel").find(".loader").toggle();
				$("#panel").find(".html").html(data);
			}
		});
	});

	$("#manage-nodes").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlManagerNodes,
			beforeSend: function() {
				$("#panel").toggle();
				$("#sub-panel").toggle();
				$("#page").toggleClass("page-fixed");
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			success : function(data) {
				$("#panel").find(".loader").hide();
				$("#panel").find(".html").html(data);
			}
		});
	});
	$(".showshema").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlShowShema,
			data : {
				'content' : $(this).data("content")
			},
			beforeSend: function() {
			},
			success : function(data) {
				$("#panel").find("#panelshema").html(data);
			}
		});
	});
	
	var numColumn = 1;
	$("#addcolumn").live("click", function() {
		numColumn++;
		$("#column-"+numColumn).show();
	});
	$("#new-node").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlAddNodeForm,
			beforeSend: function() {
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			success : function(data) {
				$("#panel").find(".loader").toggle();
				$("#panel").find(".html").html(data);
			}
		});
	});
	$("#delete-type-content").live("click", function() {
		$.ajax({
			type : 'post',
			url : urlDeleteNode,
			data : {
				'name' : $(this).data("name")
			},
			beforeSend: function() {
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			success : function(data) {
				$("#manage-nodes").trigger("click");
			}
		});
	});
	$("#save-node").live("click", function() {
		var formData = new FormData(document.forms.namedItem("addNodeForm"));
		$.ajax({
			type : 'post',
			url : urlAddNodeSave,
			processData: false,
    		contentType: false,
			data : formData,
			beforeSend: function() {
				$("#panel").find(".html").html('');
				$("#panel").find(".loader").toggle();
			},
			success : function(data) {
				$("#manage-nodes").trigger("click");
			}
		});
	});
});