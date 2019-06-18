<?php
class ProductoBase
{
    public function converttodata()
    {
        require_once 'VO\ProductoVO.php';
        $producto= new ProductoVO();
        $producto->__SET('clave', $_REQUEST['clave']);
        $producto->__SET('nombre',  utf8_decode($_REQUEST['nombre']));
        $producto->__SET('descripcion', utf8_decode($_REQUEST['descripcion']));
        $producto->__SET('precio', $_REQUEST['precio']);
        $producto->__SET('preciooferta', $_REQUEST['preciooferta']);
        $producto->__SET('visible', $_REQUEST['visible']);
        return $producto;
    }
    public function converttoid()
    {
        require_once 'VO\ProductoVO.php';
        $producto= new ProductoVO();
        $producto->__SET('clave', $_REQUEST['clave']);
        return $producto;
    }
}
?>
