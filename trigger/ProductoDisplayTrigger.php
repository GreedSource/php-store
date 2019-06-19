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
	private function GetData()
	{
		include_once("model/ProductModel.php");
		$trigger = new ProductModel();
		$data = $trigger->showAll();
		return $data;
	}

	public function GetTable()
	{
		return $this->GetData();
	}
}        
?>