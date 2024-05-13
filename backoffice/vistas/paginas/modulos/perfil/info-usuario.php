<div class="col-12 col-md-4">

	<div class="card card-info card-outline">

		<div class="card-body box-profile">

			<div class="text-center">

			<?php if ($usuario["foto"] == ""): ?>

				<img class="profile-user-img img-fluid img-circle" src="vistas/img/usuarios/default/shinobo1.jpg">

			<?php else: ?>

				<img class="profile-user-img img-fluid img-circle" src="<?php echo $usuario["foto"] ?>">
				
			<?php endif ?>
				
			 

			</div>	

			<h3 class="profile-username text-center">
				
				<?php echo $usuario["nombre"] ?>

			</h3>

			<p class="text-muted text-center">

				<?php echo $usuario["email"] ?>

			</p>

			<div class="text-center">
				
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cambiarFoto">Cambiar foto</button>
				<button class="btn btn-purple btn-sm" data-toggle="modal" data-target="#cambiarPassword">Cambiar contraseña</button>

			</div>

		</div>

		<div class="card-footer">

			<button class="btn btn-default float-right">Eliminar cuenta</button>

		</div>

	</div>	
	
</div>

<!--=====================================
Cambiar foto perfil
======================================-->

<!-- The Modal -->
<div class="modal" id="cambiarFoto">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form method="post" enctype="multipart/form-data">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Cambiar imagen</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      <div class="modal-body">

	      	<input type="hidden" name="idUsuarioFoto" value="<?php echo $usuario["id_usuario"] ?>">
	        
			<div class="form-group">
				
				<input type="file" class="form-control-file border" name="cambiarImagen" required>

				<input type="hidden" name="fotoActual" value="<?php echo $usuario["foto"] ?>">

			</div>


	      </div>

	      <!-- Modal footer -->
	      <div class="modal-footer d-flex justify-content-between">

	      	<div>
	        	
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

	        </div>

        	<div>
	        	
	        	<button type="submit" class="btn btn-primary">Enviar</button>

	        </div>

	      </div>

		<?php

			$cambiarImagen = new ControladorUsuarios();
			$cambiarImagen -> ctrCambiarFotoPerfil();

		?>


      </form>

    </div>
  </div>
</div>

<!--=====================================
Cambiar Contraseña
======================================-->

<!-- The Modal -->
<div class="modal" id="cambiarPassword">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form method="post">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Cambiar contraseña</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      <div class="modal-body">

	      	<input type="hidden" name="idUsuarioPassword" value="<?php echo $usuario["id_usuario"] ?>">
	        
			<div class="form-group">
				
				<input type="password" class="form-control" placeholder="Nueva contraseña" name="editarPassword" required>

			</div>

	      </div>

	      <!-- Modal footer -->
	      <div class="modal-footer d-flex justify-content-between">

	      	<div>
	        	
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

	        </div>

        	<div>
	        	
	        	<button type="submit" class="btn btn-primary">Enviar</button>

	        </div>

	      </div>

		<?php

			$cambiarPassword = new ControladorUsuarios();
			$cambiarPassword -> ctrCambiarPassword();

		?>


      </form>

    </div>
  </div>
</div>