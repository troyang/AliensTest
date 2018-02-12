<?php

require_once $_SERVER['DOCUMENT_ROOT']."/classes/Models/C.php";
/*
	Class SociumController responsible for communication frontend and backend
*/
Class SociumController{
	/*
		Controlls delivery o material to the reciever
	*/
	public static function deliveryMaterials($deliver){
		$type = get_class($deliver); 
		switch ($type) {
			case 'Alien':
				$deliver->setMaterials(false);
				RecieverController::declineMaterial($deliver);
				return ;
				break;
			case 'Human':
				RecieverController::acceptMaterial($deliver);
				break;
			case 'Asocial':
				$isDrunk = $deliver->getState();
				if(!$isDrunk){
					RecieverController::acceptMaterial($deliver);
				} else{
					RecieverController::declineMaterial($deliver);
				}
				break;	
			default:
				echo "Something went wrong";
				break;
		}
	}



}