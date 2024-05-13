/*=============================================
ANIMACIONES SCROLL HEADER
=============================================*/

$(window).scroll(function(){

	var posY = window.pageYOffset;
	
	if(posY > 10){

		$("header").css({"background":"#043248", "transition":".3s all"})


	}else{

		$("header").css({"background":"rgba(0,0,0,.1)", "transition":".3s all"})

	}

})

/*=============================================
MENÚ MÓVIL
=============================================*/

$(".logotipo .fa-bars").click(function(){

	$(".menuMovil").show("fast");

})

$(".menuMovil ul li .fa-times").click(function(){

	$(".menuMovil").hide("fast");

})

/*=============================================
CURSOS
=============================================*/

var videos = $(".cursos video");

$(".cursos video").click(function(){

	for(var i = 0; i < videos.length; i++){

		$(videos[i])[0].pause();

	}

	$(this).attr("controls",true)
	$(this)[0].play();

})

/*=============================================
FAQ
=============================================*/

var listaPreguntas = $(".faq ul li.nav-item");

$(".faq ul li.nav-item").click(function(){

	var respuesta = $(this).attr("respuesta");

	for(var i = 0; i < listaPreguntas.length; i++){

		$(listaPreguntas[i]).removeClass("bg-light");

		$(listaPreguntas[i]).children("a").children("i").removeClass("fa-chevron-left");

		$(listaPreguntas[i]).children("a").children("i").addClass("fa-chevron-right");
	
	}

	$(this).addClass("bg-light");

	$(this).children("a").children("i").removeClass("fa-chevron-right");

	$(this).children("a").children("i").addClass("fa-chevron-left");

	$(".respuestas p").html(respuesta);

})

/*=============================================
DESPLAZAMIENTO MENÚ
=============================================*/

if(window.matchMedia("(max-width:768px)").matches){

	$(".menuMovil ul li a").click(function(e){

		$(".menuMovil").slideToggle('fast');

		e.preventDefault();

		var vinculo = $(this).attr("href");

		$("html, body").animate({

			scrollTop: $(vinculo).offset().top - 60

		}, 2000, "easeOutQuint")

	})


}else{

	$(".botonera ul li a").click(function(e){

		e.preventDefault();

		var vinculo = $(this).attr("href");

		$("html, body").animate({

			scrollTop: $(vinculo).offset().top - 60

		}, 2000, "easeOutQuint")

	})

}


/*=============================================
SCROLL UP
=============================================*/

$.scrollUp({
	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"
})

/*=============================================
PRELOAD
=============================================*/
var incremento = 0;

$('body').nitePreload({
	srcAttr: 'data-nite-src',
	onProgress: function(a) {

		$("body").css({"overflow-y":"hidden"});

		incremento = Math.floor(a.percentage);

		$("#porcentajeCarga").html(incremento+"%");

		$("#rellenoCarga").css({"width":incremento+"%"})

		if(incremento >= 100){

			$("#preload").delay(350).fadeOut("slow");
			$("body").delay(350).css({"overflow-y":"scroll"})

		}
	
	}
});

$(".fotoIngreso, .fotoRegistro").css({"height":$(".formulario").height()+"px"})

/*=============================================
BORRAR ALERTAS
=============================================*/

$("input[name='registroEmail'], #politicas").change(function(){

	$(".alert").remove();

})

/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/

var ruta = $("#ruta").val();

$("input[name='registroEmail']").change(function(){

	var email = $(this).val();
	
	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({

		url: ruta+"backoffice/ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
			
			if(respuesta){

				$("input[name='registroEmail']").val("");

				$("input[name='registroEmail']").after(`

						<div class="alert alert-warning">
							<strong>ERROR:</strong>
							El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente

						</div>
				`)

				return;

			}

		}

	})

})

/*=============================================
Validar políticas
=============================================*/

function validarPoliticas(){

	var politicas = $("#politicas:checked").val();

	if(politicas != "on"){

		$("#politicas").before(`

				<div class="alert alert-danger">
					<strong>ERROR:</strong>
					Debe aceptar los términos y condiciones
				</div>

			`);

		return false;
	}

	return true;

}