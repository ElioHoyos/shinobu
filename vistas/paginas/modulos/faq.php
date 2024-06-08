
<!--=====================================
service
======================================-->

<section id="map" class="section ct-u-paddingTop100">

    <div class="ct-headerBox ct-headerBox--type1">
        <div class="ct-headerBox-media">
            <img src="vistas/img/demo-content/iconBox15.png" alt="icon">
        </div>

        <div class="ct-headerBox-body">
            <h3><span>LETS GET IN CONTACT</span> <small><span>WE ARE HAPPY TO HEAR SOMETHING FROM YOU</span></small></h3>
        </div>
    </div>

    <div class="ct-map-container">
        <div class="ct-map" data-height="355"></div>
    </div>
</section>

<section class="ct-u-paddingTop150">


    <div class="ct-form-container ct-u-marginBottom100">
        <div class="container">

            <div class="successMessage alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Congratulation, mission success
            </div>

            <div class="errorMessage alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Danger!</strong> You did something wrong
            </div>

    <!-- FORMULARIO -->  
        <div id="formulario">
        <form action="modelos/guardar.php" method="post" onsubmit="return validateAndFormatDate();">
        <div class="row ct-u-marginBottom30">
            <div class="col-md-6">
                <div class="ct-form-header ct-u-marginBottom30">
                    <img src="vistas/img/demo-content/formLogo.png" alt="">
                    <h2><span>SHINOBU</span></h2>
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ct-contactInfo ct-u-marginBottom30">
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-mobile"></i> <a href="tel:913 593 204">913 593 204</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope-o"></i> <a href="https://www.google.com/maps/dir/?api=1&destination=-8.37612764536%2C-74.55782&fbclid=IwZXh0bgNhZW0CMTAAAR23kF6ruyVOjfsHw-rhiur2w9WrvNDB0RErA9RSPRKyKX479zJLlTxnRIk_aem_AZXhmpmWSvb9i-BqdCYltBuZaamyq8VhbAJSuxoefYJmExX2NqACIkwWHngQTwSeI1wnfgzscQqc03Y3eJEGeevL" target="_blank"> Jr. Antunes de mayolo </a> /<a href="https://www.google.com/maps/dir/?api=1&destination=-8.37612764536%2C-74.55782&fbclid=IwZXh0bgNhZW0CMTAAAR23kF6ruyVOjfsHw-rhiur2w9WrvNDB0RErA9RSPRKyKX479zJLlTxnRIk_aem_AZXhmpmWSvb9i-BqdCYltBuZaamyq8VhbAJSuxoefYJmExX2NqACIkwWHngQTwSeI1wnfgzscQqc03Y3eJEGeevL" target="_blank">Av. eglinton , Pucallpa, Peru</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ct-u-marginBottom30">
                    <input type="text" class="form-control" name="nombres" required placeholder="NOMBRE COMPLETO">
                    <label for="firstName">NOMBRE y APELLIDO COMPLETO</label>
                </div>
                <div class="form-group ct-u-marginBottom30">
                    <input type="number" class="form-control" name="telefono" required placeholder="NUMERO DE CELULAR">
                    <label for="adress">NUMERO DE CELULAR</label>
                </div>
                <div class="form-group ct-u-marginBottom30">
                    <input type="email" class="form-control" name="tipo" required placeholder="TIPO">
                    <label for="adress">EMAIL</label>
                </div>                    
            </div>            
            <div class="col-md-6">
                <div class="form-group ct-u-marginBottom30">
                    <input type="text" class="form-control" name="fechaNac" required placeholder="FECHA DE NACIMIENTO (DD-MM-AAAA)">
                    <label for="lastName">FECHA DE NACIMIENTO</label>
                </div>
                <div class="form-group ct-u-marginBottom30">
                    <input type="text" class="form-control" name="Documento" required placeholder="DOCUMENTO">
                    <label for="text">DOCUMENTO</label>
                </div>
                <div class="ct-u-marginBottom30">
                <select class="form-control" name="genero"  required >
                            <option value=""  disabled selected class="text-white">GÉNERO</option>
                            <option value="masculino" class="text-white">MASCULINO</option>
                            <option value="femenino" class="text-white">FEMENINO</option>
                            <option value="otros" class="text-white">OTROS</option>
                        </select>
                </div>
                <div class=" ct-u-marginBottom30">
                <select class="form-control"  name="Nivel" required >
                            <option value=""   disabled selected class="text-white">Selecciona tu NIVEL</option>
                            <option value="BASICO" class="text-white">BASICO</option>
                            <option value="INTERMEDIO">INTERMEDIO</option>
                            <option value="INSTRUCTOR" class="text-white">INSTRUCTOR</option>
                        </select>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-xs-12 ct-u-marginBottom30">
                <div class="form-group">
                    <textarea class="form-control" name="mensaje" id="textarea" rows="7" required placeholder="MENSAJE"></textarea>
                    <label for="textarea">MENSAJE</label>
                </div>
            </div>
            <div class="col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4">
                                    <button type="submit" class="btn btn-block ct-btn--o btn-default"><span>Submit</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </form>

    <script>
    function validateAndFormatDate() {
        var fechaInput = document.getElementsByName('fechaNac')[0].value;
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
            document.getElementsByName('fechaNac')[0].value = validDate;
            return true;
        } else {
            alert('Formato de fecha no válido. Por favor, use DD-MM-AAAA o formatos similares.');
            return false;
        }
    }
    </script>
        </div>
        </div>
    </div>
</section>

<section class="ct-callToAction ct-callToAction--type1">
    <div class="ct-callToAction-inner">
        <div class="container">
            <h5 class="ct-callToAction-header text-uppercase text-center">Subscribe to our Academy for latest news</h5>


            <div class="successMessage alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Congratulation, mission success
            </div>

            <div class="errorMessage alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Danger!</strong> You did something wrong
            </div>


            <form data-email-subject="Form Subject" class="validateIt" role="form" action="assets/form/send.php" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="subscribe" placeholder="E-mail" required name="field[]">
                                    <label for="subscribe">You e-mail Adress</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-5">
                                <button type="submit" class="btn btn-block ct-btn--o btn-default ct-u-ls-2"><span>Subscribe</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>