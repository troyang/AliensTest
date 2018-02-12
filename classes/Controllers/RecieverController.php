<?php

require_once $_SERVER['DOCUMENT_ROOT']."/classes/Models/C.php";

/*
	Class RecieverController makes acceptance of materials and controls deliveries
*/
Class RecieverController{
	/*
		Method that adds material to file with state accepted
	*/
	public static function acceptMaterial($deliver){
		$file = $_SERVER['DOCUMENT_ROOT']."/test";
		$arrData = self::getAllDeliveries();
		$newDelivery = $deliver->toArray();
		$newDelivery['state'] = "accepted";
		if($deliver->getMaterials()=="good"){
			$newDelivery['mood'] = "happy";
		} else {
			$newDelivery['mood'] = "sad";
		}
		$arrData[] = $newDelivery;
		$res = json_encode($arrData);
		file_put_contents($file,$res);
	}
	/*
		Method that adds material to file with state declined
	*/
	public static function declineMaterial($deliver){
		$file = $_SERVER['DOCUMENT_ROOT']."/test";
		$arrData = self::getAllDeliveries();
		$newDelivery = $deliver->toArray();
		$newDelivery['state'] = "declined";
		$newDelivery['mood'] = NULL;
		$arrData[] = $newDelivery;
		$res = json_encode($arrData);
		file_put_contents($file,$res);
	}

	/*
		Read data from file and return as array
	*/
	public	static	function getAllDeliveries(){
		$file = $_SERVER['DOCUMENT_ROOT']."/test";
		$data = file_get_contents($file);
		$arrData = json_decode($data,true);
		return $arrData	;
	}
	/*
		Return html table with all data;
	*/
	public	static	function showDeliveries(){
		$arrData = self::getAllDeliveries();
		if(!empty($arrData)){
			$res = '<table><tr>
		    		<th>N</th>
		    		<th>type</th>
		    		<th>Materials</th>
		    		<th>State</th>
		    		<th>Reciever mood</th>
			</tr>';	
			foreach ($arrData as $key => $value) {
				$number	= $key+1;	
				$res.= "<tr><td>".$number."</td>";
				$res.= "<td>".$value['type']."</td><td>".$value['materials']."</td><td>".$value['state']."</td><td>";
				if ($value['mood']==NULL) {
					$res.="-";
				} else {
					$res.=$value['mood'];
				}
				$res."</td></tr></table>";
			}
		}		
		return	$res;
	}
}