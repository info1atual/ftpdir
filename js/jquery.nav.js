$(document).ready(function(){
	baseURL = "http://" + location.hostname + "/aula/";

	$(function() {

	    // var windowH = $(window).height();
	    // var wrapperH = $('#conteudo').height();
	    // if(windowH > wrapperH) {
	        // $('#conteudo').css({'height':($(window).height())+'px'});
	    // }
        var windowH = $(window).height();
        var wrapperH = $('#conteudo').height();
        var differenceH = windowH - wrapperH;
        var newH = wrapperH + differenceH + 100;
        var truecontentH = $(window).height()+100;
        $('#conteudo').css('height', (truecontentH)+'px');

	    $(window).resize(function() {

	    	var windowH = $(window).height();
	        var wrapperH = $('#conteudo').height();
	        var differenceH = windowH - wrapperH;
	        var newH = wrapperH + differenceH + 100;
	        var truecontentH = $(window).height()+100;
	        // $('#conteudo').css('height', (truecontentH)+'px');
	        if(windowH > truecontentH) {
	        	$('#container').css('height', (truecontentH)+'px');
	            $('#conteudo').css('height', (truecontentH)+'px');
	        }

	    });

	});
});