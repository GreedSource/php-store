<?php
class MasterPage
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
    private function GenerateCSS()
	{
        $css ='<!-- BEGIN STYLESHEETS -->
		<!--<link href="http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900"  type="text/css"/>-->
		<link type="text/css" rel="stylesheet" href="recursos/styletemplate/assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="recursos/styletemplate/assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="recursos/styletemplate/assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="recursos/styletemplate/assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<link type="text/css" rel="stylesheet" href="css/sweetalert2.min.css">
		<!-- END STYLESHEETS -->';
        return  $css;
    }
    private function GenerateJS($codigo)
	{
        $js = '	<!-- BEGIN JAVASCRIPT -->
		<script src="recursos/styletemplate/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="recursos/styletemplate/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="recursos/styletemplate/assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="recursos/styletemplate/assets/js/libs/spin.js/spin.min.js"></script>
		<script src="recursos/styletemplate/assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="recursos/styletemplate/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="recursos/styletemplate/assets/js/core/source/App.js"></script>
		<script src="recursos/styletemplate/assets/js/core/source/AppNavigation.js"></script>
		<script src="recursos/styletemplate/assets/js/core/source/AppOffcanvas.js"></script>
		<script src="recursos/styletemplate/assets/js/core/source/AppCard.js"></script>
		<script src="recursos/styletemplate/assets/js/core/source/AppForm.js"></script>
		<script src="recursos/styletemplate/assets/js/core/source/AppNavSearch.js"></script>
		<script src="recursos/styletemplate/assets/js/core/source/AppVendor.js"></script>
        <script src="recursos/styletemplate/assets/js/core/demo/Demo.js"></script>
        <script src="recursos/styletemplate/assets/js/libs/bootstrap-dialog/js/bootstrap-dialog.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        '.$codigo.'
		<!-- END JAVASCRIPT -->';
        return $js;
    }
    private function GenerateHeader()
	{
        $header = '<!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Punto de Venta</title>
        
                <!-- BEGIN META -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="keywords" content="your,keywords">
                <meta name="description" content="Short explanation about this website">
                <!-- END META -->
                '.$this->GenerateCSS().'
            </head>
            <body class="menubar-hoverable header-fixed ">
        
                <!-- BEGIN HEADER-->
                <header id="header" >
                    <div class="headerbar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="headerbar-left">
                            <ul class="header-nav header-nav-options">
                                <li class="header-nav-brand" >
                                    <div class="brand-holder">
                                        <a href="index.php">
                                            <span class="text-lg text-bold text-primary">Punto de Venta</span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="headerbar-right">
                            
                            <ul class="header-nav header-nav-profile">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                                        <img src="../../assets/img/avatar1.jpg?1403934956" alt="" />
                                        <span class="profile-info">
                                            Daniel Johnson
                                            <small>Administrator</small>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu animation-dock">
                                        <li class="dropdown-header">Configuraciones</li>
                                        <li><a href="index.php">Mi Perfil</a></li>
                                        
                                        <li class="divider"></li>
                                        <li><a href="index.php"><i class="fa fa-fw fa-power-off text-danger"></i>Salir</a></li>
                                    </ul><!--end .dropdown-menu -->
                                </li><!--end .dropdown -->
                            </ul><!--end .header-nav-profile -->
                            
                        </div><!--end #header-navbar-collapse -->
                    </div>
                </header>
                <!-- END HEADER-->
        
                <!-- BEGIN BASE-->
                <div id="base">
        
                    <!-- BEGIN OFFCANVAS LEFT -->
                    <div class="offcanvas">
                    </div><!--end .offcanvas-->
                    <!-- END OFFCANVAS LEFT -->
        
                    <!-- BEGIN CONTENT-->
                    <div id="content">
                        <section>
                        
                            <div class="section-body contain-lg">
        
                                <!-- BEGIN BASIC ELEMENTS -->
                                <div class="row">
                                
                                    <div class="col-md-12 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
        ';
        return $header;
    }
    private function GenerateMenubar()
	{
        $menubar = '<!-- BEGIN MENUBAR-->
        <div id="menubar" class="menubar-inverse ">				
            <div class="menubar-scroll-panel">

                <!-- BEGIN MAIN MENU -->
                <ul id="main-menu" class="gui-controls">

                    <!-- BEGIN DASHBOARD -->
                    <li>
                        <a href="index.php" >
                            <div class="gui-icon"><i class="md md-home"></i></div>
                            <span class="title">Menú</span>
                        </a>
                    </li><!--end /menu-li -->
                    <!-- END DASHBOARD -->

                    
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><span class="glyphicon glyphicon-list-alt"></span></div>
                            <span class="title">Apartados</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="#" class="active"><span class="title">Productos</span></a></li>
                            <li><a href="#" ><span class="title">Clientes</span></a></li>
                            
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END FORMS -->

                    
                </ul><!--end .main-menu -->
                <!-- END MAIN MENU -->

                <div class="menubar-foot-panel">
                    <small class="no-linebreak hidden-folded">
                        <span class="opacity-75"><strong>Pasacodigo</strong>
                    </small>
                </div>
            </div><!--end .menubar-scroll-panel-->
        </div><!--end #menubar-->
        <!-- END MENUBAR -->
        ';
        return $menubar;
    }
    public function GetFooter($script = "")
	{
        $footer = '
        </div><!--end .card-body -->
								</div><!--end .card -->
								
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END BASIC ELEMENTS -->

						

					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->
            '.$this->GenerateMenubar().'			
			<!-- END OFFCANVAS RIGHT -->

		</div><!--end #base-->
		<!-- END BASE -->

		'.$this->GenerateJS($script).'
            </body>
        </html>';
        return  $footer;
    }
    public function GetPage()
	{
		return $this->GenerateHeader();
	}
}
?>