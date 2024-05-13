
<?php

include "modulos/preload.php";

if(isset($_POST["idioma"])){

	if($_POST["idioma"] == "es"){

		include "modulos/header.php";

	}else{		

		include "modulos/header_en.php";

	}

}else{

	include "modulos/header.php";
}

include "modulos/menu-movil.php";

include "modulos/hero.php";

include "modulos/cursos.php";

include "modulos/nosotros.php";

include "modulos/testimonios.php";

include "modulos/planes.php";

include "modulos/faq.php";

include "modulos/footer.php";