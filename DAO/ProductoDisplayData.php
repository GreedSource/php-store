<?php
include "Base.php";
include "IStrategy.php";
include "VO\ProductoVO.php";

class ProductoDisplayData extends Base implements IStrategy{
    private $tabla = 'productotb'; 
    public function algorithm(){
        $_sql = "SELECT * FROM {$this->tabla};";  
        $this->query($_sql);
        $data=$this->resultset();
        //var_dump($data);
        $result = array();
        foreach($data as $r)
            {
                $obj = new ProductoVO();

                $obj->clave = $r["clave"];
                $obj->__SET('nombre', $r["nombre"]);
                $obj->__SET('descripcion', $r["descripcion"]);
                $obj->__SET('precio', $r["precio"]);
                $obj->__SET('preciooferta', $r["preciooferta"]);
                $obj->__SET('visible', $r["visible"]);
                $result[] = $obj;
            }
        return $result;  
    }
    
}
?> 