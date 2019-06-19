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
        <div class="box-header with-border">
            <h3 class="box-title">Add Product</h3>
        </div>
        <form class="form-horizontal" id="form">
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="'.$this->Exist($data, 'name').'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Descripción:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Descripción del producto" value="'.$this->Exist($data, 'description').'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Precio:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Precio del producto" value="'.$this->Exist($data, 'price').'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stock" class="col-sm-2 control-label">Stock:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Cantidad del producto" value="'.$this->Exist($data, 'stock').'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_brand" class="col-sm-2 control-label">Marca:</label>
                    <div class="col-sm-10">
                        <select id="id_brand" name="id_brand" class="form-control">
                            <option>Seleccionar</option>
                            <option value="1">Coca cola</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_supplier" class="col-sm-2 control-label">Distribuidor:</label>
                    <div class="col-sm-10">
                        <select id="id_supplier" name="id_supplier" class="form-control">
                            <option>Seleccionar</option>
                            <option value="1">Bepensa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_category" class="col-sm-2 control-label">Categoria:</label>
                    <div class="col-sm-10">
                        <select id="id_category" name="id_category" class="form-control">
                            <option>Seleccionar</option>
                            <option value="1">Bebidas</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" onclick="load(\'product\', \'gettable\')" class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
            </div>
            <!-- /.box-footer -->
        </form>';
        return $tmp;
    }

    private function Exist($data, $val){
        if(isset($data[$val])){
            return $data[$val];
        }else{
            return null;
        }
    }

    public function GetView($data){
        return $this->GenerateTemplate($data);
    }
}