<?php
class ProductoUpdateTrigger{
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
    public function GetUpdate(){
        include_once("service/ClientCtrl.php");
        $trigger = new ClientCtrl();
        $update = $trigger->changeData();

        if($update == 1){
            echo "<script> Swal('Eliminado!','El registro ha sido eliminado.','success');</script>";
            echo '<script> window.location.href = "index";</script>';
        }else{

        }
    }
}
?>