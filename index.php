<?php
include_once("trigger/ProductoDisplayTrigger.php");
include_once("template/MasterPage.php");

if(!isset($_REQUEST['action']))
{
	$tmp = MasterPage::GetMaster();
	echo $tmp->GetPage();

	$tb=ProductoDisplayTrigger::GetDisplay();	 
	echo $tb->GetTable();
	
	echo '<a href="guardar" class="btn btn-outline btn-success pull-right"> 
	<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo Producto
	</a>
	<a href="?action=json" class="btn btn-outline btn-success pull-right"> 
	<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Ver JSON
	</a>';
	$script = '<script src="js/script_producto.js" text="text/javascript"></script>';
	echo $tmp->GetFooter($script);
}else{
	if($_REQUEST['action'] === "json"){
		$tb=ProductoDisplayTrigger::GetDisplay();	 
		header('Content-Type: application/json');
		echo $tb->GetJSON();	
	}
}
