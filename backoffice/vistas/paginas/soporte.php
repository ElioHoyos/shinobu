<?php
require_once "controladores/Soporte.controlador.php";

// Obtener los datos de soporte
$controlador = new ControladorSoporte();
$usuarios = $controlador->ctrMostrarSoportes();
?>

<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Soporte</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Soporte</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <div class="content-page">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-holder">
              <center>
                <p class="main-title">Clientes Registrados</p>
                <hr>
              </center> 
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <table id="tablaSoporte" class="table table-bordered table-striped dt-responsive">
              <thead class="bg-black text-white">
                <tr>
                  <th>#</th>
                  <th>Nombre y Apellidos</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Fecha Nacimiento</th>
                  <th>Documento</th>
                  <th>Genero</th>
                  <th>Nivel</th>
                  <th>Mensaje</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                  <tr>
                    <td><?= $usuario["id_soporte"] ?></td>
                    <td><?= $usuario["nombres"] ?></td>
                    <td><?= $usuario["telefono"] ?></td>
                    <td><?= $usuario["tipo"] ?></td>
                    <td><?= $usuario["fechaNac"] ?></td>
                    <td><?= $usuario["Documento"] ?></td>
                    <td><?= $usuario["genero"] ?></td>
                    <td><?= $usuario["Nivel"] ?></td>
                    <td><?= $usuario["mensaje"] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#tablaSoporte').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "stripeClasses": [] // Elimina las clases de zebra striping
    });
});
</script>
