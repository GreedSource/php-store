<?php
include "Base.php";
include "IStrategy.php";
include "ProductoBase.php";

class ProductoQueryData extends Base implements IStrategy{
    private $tabla = 'productotb'; 
    public function algorithm(){
        $obj = new ProductoBase();
        $data = $obj->converttoid();
        //$cmd .=
        $_sql = "SELECT * FROM {$this->tabla} WHERE clave = :clave;";   
        $this->query($_sql);
        $this->bind(':clave',  $data->__GET('clave'));
        return $this->single();
    }
}
?>