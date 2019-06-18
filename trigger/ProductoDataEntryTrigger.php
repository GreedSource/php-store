<?php
/**
 * Created by PhpStorm.
 * User: greed
 * Date: 25/01/2019
 * Time: 08:46 PM
 */

class ProductoDataEntryTrigger
{
    private static $instancia;

    private function __Construct(){
    }

    public static function GetDisplay(){
        if (!(self::$instancia instanceof self)){
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    public function GetDataEntry(){
        include_once("service/ClientCtrl.php");
        $trigger = new ClientCtrl();
        $entry = $trigger->insertData();
        return $entry;
    }
}