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
		include_once("service/ClientCtrl.php");
		$trigger=new ClientCtrl();
		$data = $trigger->showAll();
		//var_dump($data);
		$table = "";
		foreach($data as $item)
		{	
			$table .= '<tr>'
					. '<td>'.$item->clave.'</td>'
					. '<td>'.utf8_encode($item->nombre).'</td>'
					. '<td>'.utf8_encode($item->descripcion).'</td>'
					. '<td>'.$item->precio.'</td>'
					. '<td><a href="javascript:void();" onclick="Update('.$item->clave.')" class="btn btn-primary btn-circle"><i class="fa fa-list">
						</i></a></td>'
					. '<td><a href="javascript:void();" class="btn btn-warning btn-circle" 
							onClick="Desactivar('.$item->clave.');"><i class="fa fa-times">
							</i></a></td>'
					. '</tr>';
		}
		return $table;
	}
	private function GenerateTable()
	{
		
		$obj='<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>precio</th>							
					<th>Modificar</th>
					<th>Desactivar</th>
				</tr>
			</thead>
			<tbody>
			'.$this->GenerateHeaderTable().'
			</tbody>
		</table>';
		return $obj;
	}

	private function GenerateJSON(){
		include_once("service/ClientCtrl.php");
		$trigger=new ClientCtrl();
		$data = $trigger->showAll();
		$json = Array();
		foreach ($data as $item) {
			$tmp = Array("clave" => utf8_decode($item->clave), "nombre" => utf8_encode($item->nombre), "descripcion" => utf8_encode($item->descripcion), "precio" => utf8_encode($item->precio), "preciooferta" => utf8_encode($item->preciooferta), "visible" => utf8_encode($item->visible));
			array_push($json, $tmp);
		}
		return json_encode($json);
	}

	public function GetJSON(){
		return $this->GenerateJSON();
	}

	public function GetTable()
	{
		return $this->GenerateTable();
	}
}        
?>