<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Shinobu Galeria de Imagenes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Galeria</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

  <div id="galeria" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

      <hr>

      <p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen (Tamaño recomendado: 1024px * 768px, peso permitido: 2Mb)</p>
        
        <ul id="lightbox" style="height: 100px;">

          <?php

          $slide = new GestorGaleria();
          $slide -> mostrarImagenVistaController();

          ?>

        </ul>

        <button id="ordenarGaleria" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Imágenes</button>

        <button id="guardarGaleria" class="btn btn-primary pull-right" style="margin:10px 30px; display:none">Guardar Orden Imágenes</button>

      </div>

      <!-- /.card-body -->

      <!-- <div class="card-footer">
        Footer
      </div> -->
        <!-- /.card-footer-->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div>