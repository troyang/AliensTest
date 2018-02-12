<?php
require_once $_SERVER['DOCUMENT_ROOT']."/classes/Models/C.php";
require_once $_SERVER['DOCUMENT_ROOT']."/classes/Controllers/C.php";

	if(isset($_GET['socium'])){
	   	$entity = new $_GET['socium'];
	   	if($entity instanceof Asocial){
		   	if(isset($_GET['drunk'])){
		   		$entity->setState($_GET['drunk']);
		   		if (isset($_GET['robber'])){
		   			$entity->setMaterials(false);
		   		} 
		   	} 
		}
	   	if(isset($_GET['materials'])){
	   		$entity->setMaterials($_GET['materials']*1);
	   	}	
		$res = SociumController::deliveryMaterials($entity);
	}

?>
<!doctype html>
<html>
<head>
	<title>AliensTest</title>  
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css"/> 
	<script type="text/javascript">
		function hidebtns(hideClass){
 			document.getElementById(hideClass).style.display ='none';
		}
		function showbtns(showClass,hideClass=''){
			if(hideClass!=''){
					document.getElementById(hideClass).style.display ='none';
			}
		    document.getElementById(showClass).style.display = 'block';
 		}
	</script>
</head>
<body>
	<h1>AliensTest</h1>
	<form method="get" action="index.php">
  		<h1>Who are you?</h1>
   		<p><input name="socium" type="radio" value="Human" onclick="showbtns('humanMat','isDrunk')">Human</p>
   			<div id="humanMat" class="hide">
					<h3>Your matherials are good?</h3>
					<p><input type="radio" value="1" name="materials">Yes </p>
					<p><input type="radio" value="0" name="materials">No</p>
			</div>
   		<p><input name="socium" type="radio" value="Asocial" onclick="showbtns('isDrunk','humanMat')";>Asocial</p>
			<div id="isDrunk" class="hide">
			<h2>Are u drunk?</h2>
				<p><input type="radio" value="1" name="drunk" onclick="showbtns('drunk','asocMat')">Yes </p>
				<p><input type="radio" value="0" name="drunk"  onclick="showbtns('asocMat','drunk')">No</p>
				<div id="drunk" class="hide">
					<h3>Do you wanna steal materials?</h3>
					<p><input type="radio" value="1" name="robber">Yes</p>
					<p><input type="radio" onclick="showbtns('asocMat')" >No</p>
				</div>
				<div id="asocMat" class="hide">
					<h3>Your materials are good?</h3>
					<p><input type="radio" value="1" name="materials">Yes </p>
					<p><input type="radio" value="0" name="materials">No</p>
			</div>
			</div>
    	<p><input name="socium" type="radio" value="Alien" onclick="hidebtns('isDrunk')">Alien</p>
    	<p><input type="submit" value="Add"></p>
   </form> 
			
	<? 
		echo RecieverController::showDeliveries();
	?>
</body>
</html>
