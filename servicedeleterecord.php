<?php 
include_once ("trigger/ProductoDeleteTrigger.php");
$entry = ProductoDeleteTrigger::GetDisplay();

if($entry->GetDelete() > 0){
	$array = array("mensaje" => "exito");
	$json = json_encode($array);
	echo $json;
}else{
	$array = array("mensaje" => "error");
	$json = json_encode($array);
	echo $json;
}

