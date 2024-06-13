<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Módulo de Imagen de Fondo de la Página</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Slide</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </section>

<!--=====================================
SLIDE ADMINISTRABLE          
======================================-->

<div id="imgSlide" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
    <hr>
        <p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen (tamaño recomendado: 1600px * 600px y peso recomendado: 2MB)</p>
	  <ul id="columnasSlide">
	    <?php
	     $slide = new GestorSlide();
	     $slide -> mostrarImagenVistaController();
	    ?>
	</ul>
	<button id="ordenarSlide" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Slides</button>
	<button id="guardarSlide" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slides</button>

</div>

<!--===============================================-->
  <!-- /.content -->

</div>