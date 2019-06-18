<?php
class ProductoDisplayTrigger
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
	private function GenerateHeaderTable()
	{
		include_once("model/ProductModel.php");
		$trigger=new ProductModel();
		$data = $trigger->showAll();
		//var_dump($data);
		$table = "";
		foreach($data as $item)
		{	
			$table .= '<tr>'
					. '<td>'.$item->id_product.'</td>'
					. '<td>'.utf8_encode($item->name).'</td>'
					. '<td>'.utf8_encode($item->description).'</td>'
					. '<td>'.$item->price.'</td>'
					. '<td>'.$item->stock.'</td>'
					. '<td>'.date('Y-m-d', strtotime($item->created_at)).'</td>'
					. '<td>'.date('Y-m-d', strtotime($item->updated_at)).'</td>'
					. '<td><a href="javascript:void();" onclick="Update('.$item->id_product.')" class="btn btn-primary btn-circle"><i class="fa fa-list">
						</i></a></td>'
					. '<td><a href="javascript:void();" class="btn btn-warning btn-circle" 
							onClick="Desactivar('.$item->id_product.');"><i class="fa fa-times">
							</i></a></td>'
					. '</tr>';
		}
		return $table;
	}
	private function GenerateTable()
	{
		
		$obj = '<div class="box-header">
            <h3 class="box-title">Product</h3> <a href="?c=product&a=AddProduct" class="btn btn-block btn-success btn-flat pull-right" style="width:150px"> 
			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo Producto
			</a>
          </div>
          <div class="box-body">
		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Stock</th>
					<th>Creado</th>
					<th>Actualizado</th>
					<th>Modificar</th>
					<th>Desactivar</th>
				</tr>
			</thead>
			<tbody>
			'.$this->GenerateHeaderTable().'
			</tbody>
		</table>
		</div>';
		return $obj;
	}

	public function GetTable()
	{
		return $this->GenerateTable();
	}
}        
?>