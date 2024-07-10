<?php
if ($usuario["perfil"] != "admin") {
    echo '<script>window.location = "'.$ruta.'backoffice/inicio";</script>';
    return;
}

$item = null;
$valor = null;
$usuarios = ControladorUsuarios::ctrMostrarusuarios($item, $valor);
?>

<div class="content-wrapper" style="min-height: 1058.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                    Agregar usuario
                </button>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        <h3 class="card-title">Usuarios registrados</h3>
            <div class="card-body">
                <!-- Table for displaying users -->
                <table class="table table-striped table-bordered dt-responsive tablaUsuarios" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Dni</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>telefono_movil</th>
                            <th>Suscripción</th>
                            <th>Fecha Nacimiento</th>
                            <th>Ciclo de pago</th>
                            <th>Enlace Afiliado</th>
                            <th>Patrocinador</th>
                            <th>Email de PayPal</th>
                            <th>Última actualización</th>
                            <th>Fecha de vencimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP loop for displaying users -->
                        <?php foreach ($usuarios as $key => $value): ?>
                        <tr>
                            <td><?php echo ($key+1); ?></td>
                            <td><img src="<?php echo $value["foto"]; ?>" class="img-fluid" width="30px"></td>
                            <td><?php echo $value["nombre"]; ?></td>
                            <td><?php echo $value["email"]; ?></td>
                            <td><?php echo $value["dni"]; ?></td>
                            <td><?php echo $value["edad"]; ?></td>
                            <td><?php echo $value["sexo"]; ?></td>
                            <td><?php echo $value["telefono_movil"]; ?></td>
                            <td><?php echo $value["suscripcion"]; ?></td>
                            <td><?php echo $value["fechaNac"]; ?></td>
                            <td><?php echo $value["ciclo_pago"]; ?></td>
                            <td><?php echo $value["enlace_afiliado"]; ?></td>
                            <td><?php echo $value["patrocinador"]; ?></td>
                            <td><?php echo $value["paypal"]; ?></td>
                            <td><?php echo $value["fecha"]; ?></td>
                            <td><?php echo $value["vencimiento"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

</div>
<!-- Modal agregar usuario -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" class="mt-3 px-4" onsubmit="return validarPoliticas()">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                <input type="text" class="form-control input-lg" name="registroNombre" placeholder="Ingresar nombre" required autocomplete="off">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
                                <input type="email" class="form-control input-lg" name="registroEmail" placeholder="Ingresar usuario (EMAIL)" id="nuevoUsuario" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                                <input type="password" class="form-control input-lg" name="registroPassword" placeholder="Ingresar contraseña" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-address-card"></i></span> 
                                <input type="number" class="form-control input-lg" name="registroDni" placeholder="Ingresar DNI (8 digitos)" required minlength="8" maxlength="8" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-child"></i></span> 
                                <select class="form-control input-lg" name="registroSexo" required>
                                    <option value="">Seleccionar Género</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                                <input type="number" class="form-control input-lg" name="registroTelefono" placeholder="Nro de Celular" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span> 
                                <input type="number" class="form-control input-lg" name="registroEdad" placeholder="Ingresar Edad" autocomplete="off">
                            </div>
                        </div>

                     
                        <div class="form-group">
                            <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                               <input type="text" class="form-control input-lg" name="registroFechaNac" placeholder="DD-MM-YYYY" autocomplete="off" pattern="\d{1,2}-\d{1,2}-\d{4}">
                             </div>
                        </div>

                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="form-control-file nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/default.png" class="img-thumbnail previsualizar" width="100px">
                            
                        </div>

                    </div>
                </div>
                <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrRegistroUsuario();
                ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>
                <script>
function validateAndFormatDate() {
    var fechaInput = document.getElementsByName('registroFechaNac')[0].value;
    var dateFormats = ['DD-MM-YYYY', 'DD/MM/YYYY', 'MM-DD-YYYY', 'MM/DD/YYYY', 'YYYY-MM-DD'];
    var validDate = null;

    for (var i = 0; i < dateFormats.length; i++) {
        var date = moment(fechaInput, dateFormats[i], true);
        if (date.isValid()) {
            validDate = date.format('YYYY-MM-DD');
            break;
        }
    }

    if (validDate) {
        document.getElementsByName('registroFechaNac')[0].value = validDate;
        return true;
    } else {
        alert('Formato de fecha no válido. Por favor, use DD-MM-AAAA o formatos similares.');
        return false;
    }
}
</script>

            </form>
        </div>
    </div>
</div>
<!-- /.modal
 
 <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                        </div>
-->
