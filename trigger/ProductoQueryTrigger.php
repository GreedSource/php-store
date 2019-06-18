<?php
class ProductoQueryTrigger{
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

    private function GenerateContentForm(){
        include_once("service/ClientCtrl.php");
        $trigger = new ClientCtrl();
        $data = $trigger->findData();
        include_once ("template/viewProducto.php");
        $view = viewProducto::GetMaster();
        $content = $view->GetView($data);
        return $content;
    }
    
    private function GenerateForm(){
        $form = '
        <form id="form-esp" method="post">
        '.$this->GenerateContentForm().'
        </form>
        ';
        return $form;
    }
    
    public function GetForm(){
        return $this->GenerateForm();
    }
}
?>