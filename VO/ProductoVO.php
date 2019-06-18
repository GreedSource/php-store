<?php
include "BaseVO.php";
class ProductoVO
{
    private $id_product;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $product_img;
    private $active = 0;
    private $id_brand;
    private $id_supplier;
    private $id_category;
    private $created_at;
    private $updated_at;
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }   
}
?>