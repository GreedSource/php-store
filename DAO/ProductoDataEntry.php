<?php
include "Base.php";
include "IStrategy.php";
include "ProductoBase.php";
class ProductoDataEntry extends Base implements IStrategy{
    private $tabla = 'productotb';
    public function algorithm(){
        $obj=new ProductoBase();
        $data=$obj->converttodata();
        $_sql = "INSERT INTO {$this->tabla}" .
                "(clave, nombre, descripcion, precio, preciooferta, visible)" .
                "VALUES(:clave, :nombre, :descripcion, :precio, :preciooferta, :visible);";
        $this->query($_sql);        
        $this->bind(':clave',         $data->__GET('clave'));
        $this->bind(':nombre',     $data->__GET('nombre'));
        $this->bind(':descripcion',   $data->__GET('descripcion')); 
        $this->bind(':precio',        $data->__GET('precio')); 
        $this->bind(':preciooferta',      $data->__GET('preciooferta'));        
        $this->bind(':visible',   $data->__GET('visible'));         
        $this->execute();        
        return $this->lastInsertId();
    }
}
?>