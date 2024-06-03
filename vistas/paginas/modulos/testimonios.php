<!--=====================================
GALERIA
======================================-->
<section id="gallery" class="section ct-u-paddingTop100">

    <div class="container">


        <div class="ct-headerBox ct-headerBox--type2">
            <div class="ct-headerBox-media">
                <img src="vistas/img/demo-content/iconBox07.png" alt="icon">
            </div>

            <div class="ct-headerBox-body">
                <h3><span>IMPRESSIONS FROM THE SHINOBU ACADEMY </span><small><span>FEEL FREE TO BROWSE OUR GALLERY</span></small></h3>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <div class="ct-portfolio-filters">
            <ul class="ct-portfolio-filters-list list-unstyled list-inline">
                <li>
                    <a href="#" class="ct-portfolio-filtersButton active" data-filter="*"><span data-content="all">all</span></a>
                </li>
                <li>
                    <a href="#" class="ct-portfolio-filtersButton" data-filter=".facility"><span data-content="facility">facility</span></a>
                </li>

                <li>
                    <a href="#" class="ct-portfolio-filtersButton" data-filter=".dojo"><span data-content="dojo">dojo</span></a>
                </li>

                <li>
                    <a href="#" class="ct-portfolio-filtersButton " data-filter=".cage"><span data-content="cage">cage</span></a>
                </li>

                <li>
                    <a href="#" class="ct-portfolio-filtersButton" data-filter=".gym"><span data-content="gym">gym</span></a>
                </li>
            </ul>
        </div>
    </div> -->


    <div class="container-fluid">
		
        <div class="ct-portfolio lightGallery ct-portfolio--col4 ct-portfolio-container">
         
        <?php
        $galeria = new Galeria();
        $galeria -> seleccionarGaleriaController();
        ?>

        </div>
    </div>

</section>