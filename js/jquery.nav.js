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

    $("#busca").focus();

    shortcut.add("f2", function() {

    	$("#busca").focus();

    });

    d = new Date();
	mes = d.getMonth()+1;
	ano = d.getFullYear();

	if (mes < 10) {
		mesX = "0"+mes;
	} else {
		mesX = mes;
	}

	$(".mes").find("option").each(function() {

	    if ($(this).val() == mesX) {

	        $(this).prop("selected", "selected");

	    }

	});

	$(".ano").find("option").each(function() {

	    if ($(this).val() == ano) {

	        $(this).prop("selected", "selected");

	    }

	});

	$('.selectpicker').selectpicker();

    $(window).on('load', function() {

    	listagemOK();

    });

	$(".pasta, .mes, .ano, .dias").change(function() {

		// $("#busca").val("");
		listagemOK();

	});

	$("#busca").keypress(function(e) {

		if(e.which == 13) {
			
			if ($.trim($("#busca").val()).length < 2) {

				$("#busca").focus();
				
			} else {
				
				listagemOK();
				$("#busca").focus();
				
			}

		}
		
	})

	$("#bt-busca").click(function() {
		
		if ($.trim($("#busca").val()).length < 2) {

			$("#busca").focus();
			
		} else {
			
			listagemOK();
			$("#busca").focus();
			
		}
		
	});

	$("#ico-adicionar").click(function() {

		$("#result").load("incluirEmpresa.php");
		setTimeout(function() {
		    $("#empresa").focus();
			$("#listagem-empresas").load("listarEmpresas.php");
		}, 500);

	});

	$("#result").on("click", "#bt-adicionar-empresa", function() {

		if ($.trim($("#empresa").val()).length > 0) {
			
			$.get("incluirEmpresaServidor.php", {

				empresa: $("#empresa").val()

			}, function(data) {
				
				$("#listagem-empresas").load("listarEmpresas.php");
				$("#empresa").focus().val("");

			});

		} else {

			$("#empresa").focus();

		}

	});

	$("#result").on("keypress", "#empresa", function(e) {

		if (e.which == 13) {

			if ($.trim($("#empresa").val()).length > 0) {
				
				$.get("incluirEmpresaServidor.php", {

					empresa: $("#empresa").val()

				}, function(data) {
					
					$("#listagem-empresas").load("listarEmpresas.php");
					$("#empresa").focus().val("");
				});
				
			} else {

				$("#empresa").focus();

			}

		}

	});

	$("#result").on("keyup", "#empresa", function() {
		
	  	$(this).val($(this).val().toUpperCase());

	});

	$("#bt-sim-excluir-empresa").click(function() {

		$("#modal-excluirEmpresa").modal("hide");

		empresa = $(this).data("nome-excluir");

		$.get("excluirEmpresa.php", {

			empresa: empresa

		}, function(data) {

			$("#listagem-empresas").load("listarEmpresas.php");

		});

	});

	$("#result").on('click', '.btn', function(e) {
		
		empresa = $(this).children("input").val();

		$("#modal-excluirEmpresa").modal("show");
		$("#nome-empresa-texto").html(empresa);
		$("#bt-sim-excluir-empresa").attr("data-nome-excluir", empresa);

	});

});

	function listagemOK() {

		pasta = $(".pasta").val();
		mes = $(".mes").val();
		ano = $(".ano").val();
		dias = $(".dias").val();
		busca = $("#busca").val();

		$.get(baseURL + 'consulta/listagemOK', {

			consulta : pasta, 
			periodo : ano+mes, 
			dias : dias,
			busca : busca

		}, function(data) {
			
			$("#result").html(data);

		});

	}
	