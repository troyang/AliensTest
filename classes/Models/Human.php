<?php
require_once $_SERVER['DOCUMENT_ROOT']."/classes/Models/C.php";

class Human extends Socium{
    /*
		Method that serialize object to the array
    */
    public function toArray(){
        return array("type"=>"Human","materials"=>$this->getMaterials());
    }

	/*
		Method that serialize object to the JSON
    */
    public function __toString(){
        return json_encode($this->toArray());
    }
    
}
