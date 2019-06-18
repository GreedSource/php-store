<?php
include_once ("trigger/ProductoDataEntryTrigger.php");
$entry = ProductoDataEntryTrigger::GetDisplay();

if($entry->GetDataEntry() > 0){
	$array = array("mensaje" => "exito");
	$json = json_encode($array);
	echo $json;
}
