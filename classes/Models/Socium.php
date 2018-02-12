<?php
require_once $_SERVER['DOCUMENT_ROOT']."/classes/Models/C.php";

class Socium{

    #true - good materials, false - bad
    private $materials; 
    
    #Method that return meterials property 
    public function getMaterials(){
        $mat = $this->materials;
        return $mat;
    }

    #Method that set meterials property 
    public function setMaterials($mat){
    	if ($mat) {
    		$mat='good';
    	} else {
    		$mat='bad';
    	}
        $this->materials = $mat;
    }
    
}
