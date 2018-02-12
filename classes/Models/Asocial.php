<?php
require_once $_SERVER['DOCUMENT_ROOT']."/classes/Models/C.php";

class Asocial extends Socium{
    
    #If true - drunk,false - sober
    private $isDrunk = false;      

    /*
        Method that serialize object to the array
    */
    public function toArray(){
        return array("type"=>"Asocial","materials"=>$this->getMaterials());
    }
    
    /*
        Method that serialize object to the JSON
    */
    public function __toString(){
        return json_encode($this->toArray());
    }

    #Method that set state property 
    public  function setState($state){
        $this->isDrunk = $state;
    }

    #Method that return state property 
    public function getState(){
        $isDrunk = $this->isDrunk;
        return $isDrunk;
    }

    
}
