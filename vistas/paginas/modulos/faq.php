
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


            <form data-email-subject="Form Subject" class="validateIt" role="form" action="assets/form/send.php" method="POST">
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
                            <input type="text" class="form-control" id="firstName" required name="field[]" placeholder="NOMBRE COMPLETO ">
                            <label for="firstName">NOMBRE COMPLETO</label>
                        </div>

                        <div class="form-group ct-u-marginBottom30">
                            <input type="text" class="form-control" id="adress" required name="field[]" placeholder="NUMERO DE CELULAR ">
                            <label for="adress">NUMERO DE CELULAR </label>
                        </div>
                        <div class="form-group ct-u-marginBottom30">
                            <input type="text" class="form-control" id="adress" required name="field[]" placeholder="TIPO">
                            <label for="adress">TIPO</label>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group ct-u-marginBottom30">
                            <input type="text" class="form-control" id="lastName" required name="field[]" placeholder="FECHA DE NACIMIENTO">
                            <label for="lastName">FECHA DE NACIMIENTO</label>
                        </div>

                        <div class="form-group ct-u-marginBottom30">
                            <input type="email" class="form-control" id="email" required name="field[]" placeholder="DOCUMENTO">
                            <label for="text">DOCUMENTO</label>
                        </div>
                        <div class="form-group ct-u-marginBottom30">
                            <select class="form-control" id="gender" required name="field[]">
                            <option value="" disabled selected>Selecciona tu género</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otros">Otros</option>
                             </select>
                            <label for="gender">Género</label>
                        </div>
                        <div class="form-group ct-u-marginBottom30">
                        <select class="form-control" id="gender" required name="field[]">
                            <option value="" disabled selected>Selecciona tu NIVEL</option>
                            <option value="masculino">BASICO</option>
                            <option value="femenino">INSTRUCTOR</option>
                            <option value="otros">INTERMEDIO</option>
                        </select>
                        <label for="gender">NIVEL</label>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 ct-u-marginBottom30">
                        <div class="form-group">
                            <textarea class="form-control" id="textarea" rows="7" required name="field[]" placeholder="Message"></textarea>
                            <label for="textarea">Message</label>
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