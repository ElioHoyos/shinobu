/*=============================================
Agregar artículo          
=============================================*/
$("#btnInstructores").click(function(){

	$("#agregarInstructor").toggle(400);

})


/*=============================================
Subir Imagen a través del Input         
=============================================*/
$("#subirFoto").change(function(){

	imagen = this.files[0];

	//Validar tamaño de la imagen

	imagenSize = imagen.size;

	if(Number(imagenSize) > 2000000){

		$("#arrastreImagenInstructor").before('<div class="alert alert-danger alerta text-center">El archivo excede el peso permitido, 200kb</div>')

	}

	else{

		$(".alerta").remove();

	}

	// Validar tipo de la imagen

	imagenType = imagen.type;

	if(imagenType == "image/jpeg" || imagenType == "image/png"){

		$(".alerta").remove();
	}

	else{

		$("#arrastreImagenInstructor").before('<div class="alert alert-danger alerta text-center">El archivo debe ser formato JPG o PNG</div>')

	}

	/*=============================================
	Mostrar imagen con AJAX       
	=============================================*/
	if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"ajax/gestorInstructoresAjax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){

					$("#arrastreImagenInstructor").before('<img src="vistas/img/status.gif" id="status">');

				},
			success: function(respuesta){
				
					$("#status").remove();

					if(respuesta == 0){

						$("#arrastreImagenInstructor").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

					}else{

						$("#arrastreImagenInstructor").html('<div id="imagenArticulo"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');

					}

			}

		})

	}

})

/*=============================================
Editar Artículo        
=============================================*/

$(".editarArticulo").click(function(){

	idArticulo = $(this).parent().parent().attr("id");
	rutaImagen = $("#"+idArticulo).children("img").attr("src");
	titulo = $("#"+idArticulo).children("h1").html();
	introduccion = $("#"+idArticulo).children("p").html();
	contenido = $("#"+idArticulo).children("input").val();

	$("#"+idArticulo).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+rutaImagen+'" class="img-thumbnail"></div></div><input type="text" value="'+titulo+'" name="editarTitulo"><textarea cols="30" rows="5" name="editarIntroduccion">'+introduccion+'</textarea><textarea name="editarContenido" id="editarContenido" cols="30" rows="10">'+contenido+'</textarea><input type="hidden" value="'+idArticulo+'" name="id"><input type="hidden" value="'+rutaImagen+'" name="fotoAntigua"><hr></form>');

	$(".cambiarImagen").click(function(){
	
		$(this).hide();

		$("#subirNuevaFoto").show();
		$("#subirNuevaFoto").css({"width":"90%"});
		$("#nuevaFoto").html("");
		$("#subirNuevaFoto").attr("name","editarImagen");
		$("#subirNuevaFoto").attr("required",true);

		$("#subirNuevaFoto").change(function(){

			imagen = this.files[0];
			imagenSize = imagen.size;

			if(Number(imagenSize) > 2000000){

				$("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

			}

			else{

				$(".alerta").remove();

			}

			imagenType = imagen.type;
			
			if(imagenType == "image/jpeg" || imagenType == "image/png"){

				$(".alerta").remove();

			}

			else{

				$("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

			}

			if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){

				var datos = new FormData();

				datos.append("imagen", imagen);	

				$.ajax({
						url:"ajax/gestorInstructoresAjax.php",
						method: "POST",
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function(){

							$("#nuevaFoto").html('<img src="vistas/img/status.gif" style="width:15%" id="status2">');

						},
						success: function(respuesta){
				
							$("#status2").remove();

							if(respuesta == 0){

								$("#editarImagen").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')
							
							}

							else{

								$("#nuevaFoto").html('<img src="'+respuesta.slice(6)+'" class="img-thumbnail">');

							}
							
						}

				})	

			}

		})

	})

})

/*=============================================
Ordenar Item Artículos
=============================================*/

var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarArticulos").click(function(){

	$("#ordenarArticulos").hide();
	$("#guardarOrdenArticulos").show();

	$("#editarArticulo").css({"cursor":"move"})
	$("#editarArticulo span i").hide()
	$("#editarArticulo button").hide()
	$("#editarArticulo img").hide()
	$("#editarArticulo p").hide()
	$("#editarArticulo hr").hide()
	$("#editarArticulo div").remove()
	$(".bloqueArticulo h1").css({"font-size":"14px","position":"absolute","padding":"10px", "top":"-15px"})
	$(".bloqueArticulo").css({"padding":"2px"})
	$("#editarArticulo span").html('<i class="glyphicon glyphicon-move" style="padding:8px"></i>')

	$("body, html").animate({

		scrollTop:$("body").offset().top

	}, 500)

	$("#editarArticulo").sortable({
		revert: true,
		connectWith: ".bloqueArticulo",
		handle: ".handleArticle",
		stop: function(event){

			for(var i= 0; i < $("#editarArticulo li").length; i++){

				almacenarOrdenId[i] = event.target.children[i].id;
				ordenItem[i]  =  i+1;

			}	
		}
	})

	$("#guardarOrdenArticulos").click(function(){

		$("#ordenarArticulos").show();
		$("#guardarOrdenArticulos").hide();

		for(var i= 0; i < $("#editarArticulo li").length; i++){

			var actualizarOrden = new FormData();
			actualizarOrden.append("actualizarOrdenArticulos", almacenarOrdenId[i]);
			actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

			$.ajax({

				url:"ajax/gestorInstructoresAjax.php",
				method: "POST",
				data: actualizarOrden,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){

					$("#editarArticulo").html(respuesta);

					swal({
						title: "¡OK!",
						text: "¡El orden se ha actualizado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "intructores";
							}
						});


				}

			})


			
		}
	
	})

})