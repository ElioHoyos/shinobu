<?php

class Slide{

	static public function seleccionarSlideController(){

		$respuesta = SlideModels::seleccionarSlideModel("slide");

		foreach ($respuesta as $row => $item){

			echo '<li>
			<img class="opaco" src="backoffice/vis' . substr($item["ruta"], 6) . '" style="opacity: 0.6;">
			<div class="slideCaption">
				
			</div>
		 </li>';
		}

	}
}