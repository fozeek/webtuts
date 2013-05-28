$(document).ready(function(){
    
    $('.check-langage').change(function(){
	if($(this).attr('checked')){
	    if($('#hidden-langage').val() == ""){
		$('#hidden-langage').val($(this).val());
	    }
	    else {
		$('#hidden-langage').val($('#hidden-langage').val() + ',' + $(this).val());
	    }
	}
	else {
	    var temp = $('#hidden-langage').val().split(',');
	    var i;
	    for(i = 0; i < temp.length; i++){
		if(temp[i] == $(this).val()){
		    delete temp[i];
		}
	    }
	    var newVal = '';
	    var cpt = 0;
	    for(i = 0; i < temp.length; i++){
		if(temp[i] != undefined){
		    if(newVal == '')
			newVal += temp[i];
		    else
			newVal += ',' + temp[i];
		    cpt++;
		}
	    }
	    $('#hidden-langage').val(newVal);
	}
    });
    
    if($('#oiseau-volant2').length > 0){
	setTimeout(function(){

		if($('#oiseau-volant2').position().left > 400){
		    $('#sang').css({'display':'block'});
		    var logo = $('nav #logo img');
		    var position = logo.position();
		    var pLeft = position.left;
		    var pTop = position.top;
		    
		    $('#oiseau-volant2').css({'z-index':'1'});
		    logo.css({'position': 'absolute', 'left': pLeft, 'top': pTop,'z-index':'99999999999999'});
		    logo.animate({'top':'335px'},800, 'linear');
		}
	}, 2050);
	setTimeout(function(){

		$('#sang-gauche').css({'display':'block'});
		$('#sang-droite').css({'display':'block'});

	}, 3250);
	setTimeout(function(){

		if($('#oiseau-volant2').position().left > 400){
		    $('#oiseau-volant2').css({'display':'none'});
		}
	}, 10000);
    }
});