<?php
include_once "Base.php";
include_once "IStrategy.php";
include_once "VO\ProductoVO.php";

class ProductoDisplayData extends Base implements IStrategy{
    private $tabla = 'product'; 
    public function algorithm(){
        $_sql = "SELECT * FROM {$this->tabla} WHERE active = 1";  
        $this->query($_sql);
        $data=$this->resultset();
        $result = array();
        foreach($data as $r)
            {
                $obj = new ProductoVO();
                $obj->__SET('id_product', $r["id_product"]);
                $obj->__SET('name', $r["name"]);
                $obj->__SET('description', $r["description"]);
                $obj->__SET('price', $r["price"]);
                $obj->__SET('stock', $r["stock"]);
                $obj->__SET('product_img', $r["product_img"]);
                $obj->__SET('active', $r["active"]);
                $obj->__SET('id_brand', $r["id_brand"]);
                $obj->__SET('id_supplier', $r["id_supplier"]);
                $obj->__SET('id_category', $r["id_category"]);
                $obj->__SET('created_at', $r["created_at"]);
                $obj->__SET('updated_at', $r["updated_at"]);

                $result[] = $obj;
            }
        return $result;  
    }
    
}
?> 