<?php
class ProductoDeleteTrigger{
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
    public function GetDelete(){
        include_once("service/ClientCtrl.php");
        $trigger = new ClientCtrl();
        $delete = $trigger->deleteData();
        return $delete;
    }
}