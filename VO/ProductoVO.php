<?php
include "BaseVO.php";
class ProductoVO
{
    private $clave;
    private $nombre;
    private $descripcion;
    private $precio;
    private $preciooferta;
    private $visible = 0;    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }   
}
?>