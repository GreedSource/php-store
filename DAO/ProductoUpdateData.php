<?php
include "Base.php";
include "IStrategy.php";
include "ProductoBase.php";
class ProductoUpdateData extends Base implements IStrategy{
private $tabla = 'productotb';    
public function algorithm(){         
    $obj=new ProductoBase();
    $data=$obj->converttodata();
    if( $data->__GET('clave')){
        $_sql = "UPDATE {$this->tabla} 
        SET nombre = :nombre,
            descripcion  = :descripcion,
            precio = :precio,
            preciooferta = :preciooferta,
            visible = :visible
        WHERE clave = :clave;";
        $this->query($_sql);       
        $this->bind(':clave',  $data->__GET('clave'));
        $this->bind(':nombre',  $data->__GET('nombre'));
        $this->bind(':descripcion',  $data->__GET('descripcion'));
        $this->bind(':precio',  $data->__GET('precio'));
        $this->bind(':preciooferta',  $data->__GET('preciooferta'));
        $this->bind(':visible',  $data->__GET('visible'));
    }         
    return $this->execute();  
} 
}
?>