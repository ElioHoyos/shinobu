<?php

class Galeria{

	public static function seleccionarGaleriaController(){

		$respuesta = GaleriaModels::seleccionarGaleriaModel("galeria");

		foreach ($respuesta as $row => $item){

			echo '
			<article class="ct-portfolio-item gym" data-src="vistas/img/demo-content/galeri9.jpg">
            <figure class="ct-hover-effect">
			<img class="grayscale" src="backoffice/vis'.substr($item["ruta"], 6).'" alt=""/>
              <figcaption>
                <div class="ct-item-hover">
                  <div class="ct-hover-container">
                    <div class="ct-hoverButton">
                      <img src="vistas/img/eyeButton.png" alt="img" onclick="showFullScreen(this)"/>
                    </div>
                    <p>ACADEMY SHINOBU</p>
                  </div>
                </div>
              </figcaption>
            </figure>
          </article>
			';

		}

	}

}


