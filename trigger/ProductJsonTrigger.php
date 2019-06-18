<?php

class ProductJsonTrigger{
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
    private function GenerateJSON(){
		include_once("model/ProductModel.php");
		$trigger=new ProductModel();
		$data = $trigger->showAll();
		$json['output'] = Array();
		foreach ($data as $item) {
			$tmp = Array(
				"id_product" => utf8_decode($item->id_product), 
				"name" => utf8_encode($item->name), 
				"description" => utf8_encode($item->description), 
				"price" => utf8_encode($item->price),
				"stock" => utf8_encode($item->stock),
				"product_img" => utf8_encode($item->product_img), 
				"active" => utf8_encode($item->active),
				"id_supplier" => utf8_encode($item->id_supplier),
				"id_brand" => utf8_encode($item->id_brand),
				"id_category" => utf8_encode($item->id_category),
				"created_at" => utf8_encode($item->created_at),
				"updated_at" => utf8_encode($item->updated_at)
			);
			array_push($json['output'], $tmp);
		}
		return json_encode($json);
	}

	public function GetJSON(){
		return $this->GenerateJSON();
	}
}