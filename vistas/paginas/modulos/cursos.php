<!--=====================================
ARTICULOS
======================================-->

<section id="testimonials" class="section ct-u-paddingTop100 ct-u-paddingBottom150" data-background="vistas/img/demo-content/galleryBG.jpg">

    <div class="container">

        <div class="ct-headerBox ct-headerBox--type2">
            <div class="ct-headerBox-media">
                <img src="vistas/img/demo-content/iconBox01.png" alt="icon">
            </div>

            <div class="ct-headerBox-body">
                <h3><span>NO MORE EXCUSES, JOIN A CLASS TODAY</span> <small><span>COME TO THE SHINOBU ACADEMY TODAY</span></small></h3>
            </div>
        </div>


        <div class="ct-testimonial ct-js-testimonial">
            <div class="ct-js-testimonial-row ct-testimonial-row">
                <article class="ct-testimonial-item ct-testimonial-item--large" data-bottom-top="left: -140%;" data-bottom="left: 0;">
                    <a href="trainer-single.html">
                    <?php

                        $articulos = new Articulos();
                        $articulos -> seleccionarArticulosController();

                        ?>
                    </a>
                </article>
            </div>
            

           
        </div>
    </div>
</section>