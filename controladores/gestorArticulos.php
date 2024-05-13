<?php

class Articulos{

	static public function seleccionarArticulosController(){

		$respuesta = ArticulosModels::seleccionarArticulosModel("articulos");

		foreach ($respuesta as $row => $item){

			echo '<div class="ct-testimonial-item-media">
            <figure>
            <img class="grayscale grayscale-fade" src="backoffice/'.$item["ruta"].'" alt="">
            </figure>
            </div>
            <div class="ct-testimonial-item-content">
            <h4 class="text-uppercase text-center ct-testimonial-item-header">
                <span>'.$item["titulo"].'</span>
                <small><span>'.$item["contenido"].'</span></small>
            </h4>
            <p class="ct-testimonial-item-text text-center text-break">
            '.$item["introduccion"].'
            </p>
        </div>';

		}


	}


}