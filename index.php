<?php

include_once("template/MasterPage.php");

/*session_name('login');
session_start();*/
date_default_timezone_set('America/Merida');

setlocale(LC_TIME, 'spanish');
// Ruta del proyecto, cambiala por la ruta que vas a usar
define( 'RUTA_HTTP', 'http://' . $_SERVER['HTTP_HOST'] . '/arquitectura/' );

//error_reporting(0);
// Todo esta lógica hara el papel de un FrontController

require_once('controller/ProductController.php');


if(!isset($_REQUEST['c'])){
    $controller = new ProductController();
    $controller->Index();
} else {

    // Obtenemos el controlador que queremos cargar
    $controller = $_REQUEST['c'] . 'Controller';
    $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    require_once("controller/".$_REQUEST['c']."Controller.php");
    // Instanciamos el controlador
    $controller = new $controller();

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}

