<?php
class ProductoHideRecord extends Base implements IStrategy{
private $tabla = 'producto';      
public function algorithm(){
    $obj=new ProductoBase();
    $data=$obj->converttodata();         
    if($data->__GET('clave')){
        $_sql = "UPDATE '{$this->tabla}' SET 'visible'=:visible WHERE 'clave' = :clave;";  
        $this->query($_sql);
        $this->bind(':visible',  $data->__GET('visible'));
        $this->bind(':clave',  $data->__GET('clave'));
    }         
    $this->execute();        

}
}
?>