

<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- GALERIA -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Publicar Noticias</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Noticias</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </section>

 <!--=====================================
ARTÍCULOS ADMINISTRABLE 1         
======================================-->

<div id="seccionArticulos" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
	<button id="btnAgregarArticulo" class="btn btn-info btn-lg">Registrar una noticia a la Página Shinobu</button>

	<!--==== AGREGAR ARTÍCULO  ====-->

	<div id="agregarArtículo" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="tituloArticulo" type="text" placeholder="Título del Artículo" class="form-control" required>

			<textarea name="introArticulo" id="" cols="30" rows="5" placeholder="Introducción del Articulo" class="form-control"  maxlength="170" required></textarea>

			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

			<p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

			<div id="arrastreImagenArticulo">	
				
			</div>

			<textarea name="contenidoArticulo" id="" cols="30" rows="10" placeholder="Contenido del Articulo" class="form-control" required></textarea>

			<input type="submit" id="guardarArticulo" value="Guardar Artículo" class="btn btn-primary">

		</form>

	</div>

	

	<?php

		$crearArticulo = new GestorArticulos();
		$crearArticulo -> guardarArticuloController();

	?>

	<hr>

	
	<!--==== EDITAR ARTÍCULO  ====-->

	<ul id="editarArticulo">

	<?php

		$mostrarArticulo = new GestorArticulos();
		$mostrarArticulo -> mostrarArticulosController();
		$mostrarArticulo -> borrarArticuloController();
		$mostrarArticulo -> editarArticuloController();

	?>
	</ul>

</div>


<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->