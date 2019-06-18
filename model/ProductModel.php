<?php
include "DAO/Context.php";
class ProductModel
{
    public function insertData()
    {
        require_once 'DAO/ProductoDataEntry.php';
        $context=new Context(new ProductoDataEntry());
        return $context->algorithm();
    }
    public function deleteData()
    {
        require_once 'DAO/ProductoDeleteRecord.php';
        $context=new Context(new ProductoDeleteRecord());
        return $context->algorithm();
    }
    public function hideData()
    {
        require_once 'DAO/ProductoHideRecord.php';
        $context=new Context(new ProductoHideRecord());
        return $context->algorithm();
        
    }
    public function showAll()
    {
        require_once 'DAO/ProductoDisplayData.php';
        $context=new Context(new ProductoDisplayData());
        return $context->algorithm();
    }
    public function findData()
    {
        require_once 'DAO/ProductoQueryData.php';
        $context=new Context(new ProductoQueryData());
        return $context->algorithm();
    }
    public function changeData()
    {
        require_once 'DAO/ProductoUpdateData.php';
        $context=new Context(new ProductoUpdateData());
        return $context->algorithm();
    }
}
?>