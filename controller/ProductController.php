<?php
class ProductController{
	
    private $controller = 'Product';

    public function Index(){
		$usr = 'Joel';
		$title = 'Productos';
        $tmp = MasterPage::GetMaster();
	    echo $tmp->GetPage($usr, $title);

	        
		$script = '<script src="'.RUTA_HTTP.'js/script_producto.js" text="text/javascript"></script>';
		$script .= '<script src="'.RUTA_HTTP.'js/product.js" text="text/javascript"></script>';
		$script .= '<script>load(\'product\', \'gettable\')</script>';
	    echo $tmp->GetFooter($script);
	}
	
	public function GetTable(){
		require_once("trigger/ProductoDisplayTrigger.php");
		$tb  = ProductoDisplayTrigger::GetDisplay();	 
		$data = $tb->GetTable();
		echo $this->GenerateTable($data);
	}

	private function GenerateHeaderTable($data)
	{
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
	
	private function GenerateTable($data)
	{
		
		$obj = '<div class="box-header">
            <h3 class="box-title">Lista de productos</h3> <button type="button" onclick="load(\'product\', \'AddProduct\')" class="btn btn-block btn-success btn-flat pull-right" style="width:150px"> 
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
			'.$this->GenerateHeaderTable($data).'
			</tbody>
		</table>
		</div>';
		return $obj;
	}

    public function JSON(){
		require_once("trigger/ProductJsonTrigger.php");
        $tb=ProductJsonTrigger::GetDisplay();	 
		header('Content-Type: application/json');
		echo $tb->GetJSON();
	}
	
	public function AddProduct(){
		include_once ("template/viewProducto.php");
		$view = viewProducto::GetMaster();
		$data = array();
    	echo $view->GetView($data);
	}

}