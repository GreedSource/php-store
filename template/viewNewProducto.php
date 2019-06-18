<?php
/**
 * Created by PhpStorm.
 * User: greed
 * Date: 25/01/2019
 * Time: 08:05 PM
 */

class viewNewProducto
{
    private static $instancia;
    private function __Construct(){
    }
    public static function GetMaster(){
        if (!(self::$instancia instanceof self)){
            self::$instancia = new self();
        }
        return self::$instancia;
    }
    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    private function GenerateTemplate(){
        $tmp = '
        <form method="post" action="guardar.php?action=guardar">
        <div class="row">
            <input class="form-control" type="hidden" name="clave" value="0">   
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="form-control">Nombre</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="nombre" value="" required>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="form-control">Descripción</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="descripcion" value="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="form-control">Precio</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="precio" value="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="form-control">Precio de oferta</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="preciooferta" value="" required>
            </div>
        </div>
        <div class="row">
            <input class="form-control" type="hidden" name="visible" value="0">
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>
        </form>
        ';
        return $tmp;
    }

    public function GetView(){
        return $this->GenerateTemplate();
    }
}