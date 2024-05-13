<div class="ladoUsuarios-nuevo">

    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-12 col-lg-4 formulario">

                <figure class="p-2 p-sm-5 p-lg-4 p-xl-5 text-center">
                
                    <a href="<?php echo $ruta; ?>inicio"><img src="vistas/img/shinobo1.jpg" class="img-fluid" width="45%"></a>

                    <div class="d-flex justify-content-between">
                    
                        <h4>Ingreso al sistema</h4>

                        <div class="dropdown text-right">

                            <button type="button" class="btn btn-light btn-sm dropdown-toggle pr-3" data-toggle="dropdown">
                                <form method="post" action="<?php echo "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
                                    
                                    <input type="hidden" name="idioma" value="es">
                                    <input type="submit" value="ES" style="border: 0;
                                                                            background: transparent;
                                                                            padding: 0;
                                                                            margin: 0;
                                                                            float: left;
                                                                            cursor: pointer;">



                                </form>
                            </button>

                            <div class="dropdown-menu">

                                <a class="dropdown-item">
                                    
                                    <form method="post" action="<?php echo "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
                                    
                                        <input type="hidden" name="idioma" value="en">
                                        <input type="submit" value="EN" style="border: 0;
                                                                                background: transparent;
                                                                                padding: 0;
                                                                                margin: 0;
                                                                                cursor: pointer;">



                                    </form>

                                </a>

                            </div>

                        </div>

                    </div>

                    <form method="post" class="mt-5 custom-form">

                        <p class="text-center py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi sunt officia unde officiis</p>

                        <input type="email" class="form-control__n my-3 py-3" placeholder="Correo Electrónico" name="ingresoEmail" required>

                        <input type="password" class="form-control__n my-3 py-3" placeholder="Contraseña" name="ingresoPassword" required>

                        <?php 

                            $ingreso = new ControladorUsuarios();
                            $ingreso -> ctrIngresoUsuario();

                        ?>

                        <input type="submit" class="form-control__n my-3 py-3 btn btn-info btn-block" value="Ingresar">

                        <p class="text-center pt-1">¿Aún no tienes una cuenta? | <a href="<?php echo $ruta; ?>registro" style="color: red;">Regístrate</a></p>

                        <p class="text-center pt-1"><a href="#modalRecuperarPassword" data-toggle="modal" data-dismiss="modal">¿Olvidó su contraseña?</a></p>

                    </form>

                </figure>

            </div>

            <div class="col-12 col-lg-8 fotoIngreso-nuevo text-center">        

			<a href="<?php echo $ruta; ?>inicio.php"><button class="d-none d-lg-block text-center btn btn-default btn-lg my-3 btnRegresar-nuevo" style="color: white; background-color: black !important; padding: 10px; border:none; ">Regresar</button></a>
                <ul class="p-0 m-0 py-4 d-flex justify-content-center redesSociales-nuevo">

                    <li>
                        <a href="#" target="_blank"><i class="fab fa-facebook-f lead text-white mx-4"></i></a>
                    </li>

                    <li>
                        <a href="#" target="_blank"><i class="fab fa-instagram lead text-white mx-4"></i></a>
                    </li>   

                    
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-linkedin lead text-white mx-4"></i></a>
                    </li>

                    <li>
                        <a href="#" target="_blank"><i class="fab fa-twitter lead text-white mx-4"></i></a>
                    </li>

                    <li>
                        <a href="#" target="_blank"><i class="fab fa-youtube lead text-white mx-4"></i></a>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>

<!-- VENTANA MODAL RECUPERAR CONTRASEÑA -->

<div class="modal" id="modalRecuperarPassword">
    
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header bg-info text-white">

                <h4 class="modal-title">Recuperar contraseña</h4>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

             <div class="modal-body">
                
                <form method="post">

                    <p class="text-muted">Escriba su correo electrónico con el que está registrado y allí le enviaremos una nueva contraseña:</p>

                    <div class="input-group mb-3">
                        
                        <div class="input-group-prepend">

                          <span class="input-group-text">
                            
                            <i class="far fa-envelope"></i>

                          </span>

                        </div>

                        <input type="email" class="form-control" placeholder="Email" name="emailRecuperarPassword" required>

                    </div>

                    <input type="submit" class="btn btn-dark btn-block" value="Enviar">

                    <?php

                        $recuperarPassword = new ControladorUsuarios();
                        $recuperarPassword -> ctrRecuperarPassword();

                    ?>

                </form>

             </div>

        </div>

    </div>

</div>
