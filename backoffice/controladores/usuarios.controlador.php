<?php

// https://github.com/PHPMailer/PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class ControladorUsuarios{

	/*=============================================
    Registro de usuarios
    =============================================*/

	public function ctrRegistroUsuario() {
		if (isset($_POST["registroNombre"])) {
			// Validación de campos
			if (
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
				preg_match('/^[0-9]{8,10}$/', $_POST["registroDni"]) &&
				preg_match('/^[0-9]+$/', $_POST["registroEdad"]) &&
				preg_match('/^[a-zA-Z]+$/', $_POST["registroSexo"]) &&
				preg_match('/^[0-9]+$/', $_POST["registroTelefono"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])
			) {
				// Encriptación de la contraseña
				$encriptar = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$encriptarEmail = md5($_POST["registroEmail"]);
				$fechaNacimiento = null;
				if (!empty($_POST["registroFechaNac"])) {
					$fechaNacimiento = date('Y-m-d', strtotime($_POST["registroFechaNac"]));
				}
	

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";
	
				// Procesar la imagen
				if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/
					$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
					if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

					   /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);  

					}
					
					if ($_FILES["nuevaFoto"]["type"] == "image/png") {

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);  

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);    
						       
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);        
						imagepng($destino, $ruta);
					} 
					//else {
						//echo '<script>
						//	swal({
						//		type: "error",
						//		title: "¡CORREGIR!",
						//		text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
						//		showConfirmButton: true,
						//		confirmButtonText: "Cerrar"
						//	}).then(function(result){
						//		if(result.value){   
						//			history.back();
						//		} 
						//	});
						//</script>';
						//return;
					//}
				}
				
				$tabla = "usuarios";
				
				$datos = array(
					"perfil" => "usuario",
					"nombre" => $_POST["registroNombre"],
					"email" => $_POST["registroEmail"],
					"password" => $encriptar,
					"dni" => $_POST["registroDni"],
					"suscripcion" => 0,
					"verificacion" => 0,
					"email_encriptado" => $encriptarEmail,
					"edad" => $_POST["registroEdad"],
					"sexo" => $_POST["registroSexo"],
					"telefono_movil" => $_POST["registroTelefono"],
					"patrocinador" => $_POST["patrocinador"],
					"fechaNac" => $fechaNacimiento,
					"foto" => $ruta
				);
	
				$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);
	
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title: "¡El usuario ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "usuarios";
							}
						});
					</script>';
				} else {
					echo '<script>
						swal({
							type: "error",
							title: "Error al guardar el usuario",
							text: "Error en la base de datos",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "usuarios";
							}
						});
					</script>';
				}
			} else {
				echo '<script>
					swal({
						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
				</script>';
			}
		}
	}


	/*=============================================
	Mostrar Usuarios
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){
	
		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	Actualizar Usuario
	=============================================*/

	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Ingreso Usuario
	=============================================*/

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingresoEmail"])){

			 if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingresoEmail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoPassword"])){

			 	$encriptar = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			 	$tabla = "usuarios";
			 	$item = "email";
			 	$valor = $_POST["ingresoEmail"];

			 	$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

			 	if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptar){

			 		if($respuesta["verificacion"] == 0){

			 			echo'<script>

							swal({
									type:"error",
								  	title: "¡ERROR!",
								  	text: "¡El correo electrónico aún no ha sido verificado, por favor revise la bandeja de entrada o la carpeta SPAM de su correo electrónico para verificar la cuenta, o contáctese con nuestro soporte a elio18david@gmail.com!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

			 		}else{

			 			$_SESSION["validarSesion"] = "ok";
			 			$_SESSION["id"] = $respuesta["id_usuario"];

			 		
					

			 			echo '<script>
					
							window.location = "'.$ruta.'backoffice";				

						</script>';

			 		}

			 	}else{

			 		echo'<script>

						swal({
								type:"error",
							  	title: "¡ERROR!",
							  	text: "¡El email o contraseña no coinciden!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';

			 	}


			 }else{

			 	echo '<script>

					swal({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten caracteres especiales en ninguno de los campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							history.back();

						}

					});	

				</script>';

			 }

		}

	}

	/*=============================================
	Cambiar foto perfil
	=============================================*/

	public function ctrCambiarFotoPerfil(){

		if(isset($_POST["idUsuarioFoto"])){

			$ruta = $_POST["fotoActual"];

			if(isset($_FILES["cambiarImagen"]["tmp_name"]) && !empty($_FILES["cambiarImagen"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["cambiarImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "vistas/img/usuarios/".$_POST["idUsuarioFoto"];

				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD Y EL CARPETA
				=============================================*/

				if($ruta != ""){

					unlink($ruta);

				}else{

					if(!file_exists($directorio)){	

						mkdir($directorio, 0755);

					}

				}

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["cambiarImagen"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["cambiarImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	


				}else if($_FILES["cambiarImagen"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["cambiarImagen"]["tmp_name"]);	

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagealphablending($destino, FALSE);
		
					imagesavealpha($destino, TRUE);		

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);		

					imagepng($destino, $ruta);

				}else{

					echo'<script>

						swal({
								type:"error",
							  	title: "¡CORREGIR!",
							  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';

				}
			
			}

			// final condicion

			$tabla = "usuarios";
			$id = $_POST["idUsuarioFoto"];
			$item = "foto";
			$valor = $ruta;

			$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

			if($respuesta == "ok"){

				echo '<script>

					swal({
						type:"success",
					  	title: "¡CORRECTO!",
					  	text: "¡La foto de perfil ha sido actualizada!",
					  	showConfirmButton: true,
						confirmButtonText: "Cerrar"
					  
					}).then(function(result){

							if(result.value){   
							    history.back();
							  } 
					});

				</script>';


			}

		}

	}

	/*=============================================
	Cambiar contraseña
	=============================================*/

	public function ctrCambiarPassword(){

		if(isset($_POST["idUsuarioPassword"])){	

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

				$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";
				$id = $_POST["idUsuarioPassword"];
				$item = "password";
				$valor = $encriptar;

				$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

				if($respuesta == "ok"){

					echo '<script>

						swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡La contraseña ha sido actualizada!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';


				}

			}else{

			 	echo '<script>

					swal({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten caracteres especiales en la contraseña!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							history.back();

						}

					});	

				</script>';

			 }


		}

	}

}

