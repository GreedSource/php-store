<?php
include_once("template/MasterPage.php");
include_once("trigger/ProductoQueryTrigger.php");
$tmp = MasterPage::GetMaster();
echo $tmp->GetPage();
if(($_SERVER["REQUEST_METHOD"] == "POST")){

    if(isset($_REQUEST['action'])){
        if(isset($_REQUEST['clave']) && $_REQUEST['action'] == "actualizar"){
            include_once("trigger/ProductoUpdateTrigger.php");
            $update = ProductoUpdateTrigger::GetDisplay();
            $update->GetUpdate();
        }else{
            if($_REQUEST['action'] == "guardar"){
                include_once ("trigger/ProductoDataEntryTrigger.php");
                $entry = ProductoDataEntryTrigger::GetDisplay();
                echo $entry->GetDataEntry();
            }
        }
    }
}
if(!isset($_REQUEST['action']) && !isset($_REQUEST['clave'])){
    include_once ("template/viewNewProducto.php");
    $view = viewNewProducto::GetMaster();
    echo $view->GetView();
}else{
    $clave = $_REQUEST['clave'];
    if($clave > 0){
        $frm=ProductoQueryTrigger::GetDisplay();
        echo $frm->GetForm();
    }
}

$script = '<script src="js/script_update_producto.js" text="text/javascript"></script>';
echo $tmp->GetFooter($script);