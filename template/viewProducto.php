<?php
/**
 * Created by PhpStorm.
 * User: greed
 * Date: 25/01/2019
 * Time: 08:05 PM
 */

class viewProducto
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
    private function GenerateTemplate($data){
        $tmp = '
        <div class="row">
            <input class="form-control" type="hidden" name="clave" value="'.$data['clave'].'">   
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="form-control">Nombre</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="nombre" value="'.$data['nombre'].'">    
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="form-control">Descripción</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="descripcion" value="'.utf8_encode($data['descripcion']).'">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="form-control">Precio</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="precio" value="'.$data['precio'].'">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label class="form-control">Precio de oferta</label>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="text" name="preciooferta" value="'.$data['preciooferta'].'">
            </div>
        </div>
        <div class="row">
            <input class="form-control" type="hidden" name="visible" value="'.$data['visible'].'">
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary" type="Guardar" id="actualizar" onclick="Update();">Actualizar</button>
                <input type="submit" id="submit" value"enviar" onclick="Update();" style="display:none;">
            </div>
        </div>
        ';
        return $tmp;
    }

    public function GetView($data){
        return $this->GenerateTemplate($data);
    }
}