<?php
class ProductController{
	
    private $controller = 'Product';

    public function Index(){
		require_once("trigger/ProductoDisplayTrigger.php");
        $tmp = MasterPage::GetMaster();
	    echo $tmp->GetPage('Joel');

	    $tb=ProductoDisplayTrigger::GetDisplay();	 
	    echo $tb->GetTable();
	    echo '
	    <a href="?c='.$this->controller.'&a=json" class="btn btn-block btn-success btn-flat pull-right"> 
	    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Ver JSON
	    </a>';
	    $script = '<script src="'.RUTA_HTTP.'js/script_producto.js" text="text/javascript"></script>';
	    echo $tmp->GetFooter($script);
    }

    public function JSON(){
		require_once("trigger/ProductJsonTrigger.php");
        $tb=ProductJsonTrigger::GetDisplay();	 
		header('Content-Type: application/json');
		echo $tb->GetJSON();
	}
	
	public function AddProduct(){
		/*include_once ("trigger/ProductoDataEntryTrigger.php");
        $entry = ProductoDataEntryTrigger::GetDisplay();
		echo $entry->GetDataEntry();*/
		include_once ("template/viewNewProducto.php");
    	$view = viewNewProducto::GetMaster();
    	echo $view->GetView();
	}

}