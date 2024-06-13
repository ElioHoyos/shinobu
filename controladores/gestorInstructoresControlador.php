<?php

class Instructores{

	static public function seleccionarArticulosController(){

		$respuesta = InstructoresModel::seleccionarInstructoresModel("instructores");

		foreach ($respuesta as $row => $item){

			echo '<div class="ct-testimonial-item-media">
            <figure>
            <img class="grayscale grayscale-fade" src="backoffice/'.$item["ruta"].'" alt="">
            </figure>
            </div>
            <div class="ct-testimonial-item-content">
            <h4 class="text-uppercase text-center ct-testimonial-item-header">
                <span>'.$item["titulo"].'</span>
            </h4>
            
        </div>';

		}


	}


}