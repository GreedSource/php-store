<?php
/**
 * Created by PhpStorm.
 * User: greed
 * Date: 22/01/2019
 * Time: 07:53 PM
 */

class MasterPage
{
    private $url;
    private static $instancia;
    private function __construct()
    {
      //RUTA_HTTP = connection::GetConnection();
    }
    public static function GetMaster()
    {
        if(!(self::$instancia instanceof self))
        {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error('La clonación de este objeto no esta permitida', E_USER_ERROR);
    }

    private function GenerateCSS(){
        $css = '
        <!--Favicon-->
        <link rel="icon" type="image/png" href="'.RUTA_HTTP.'assets/dist/img/favicon.png">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="'.RUTA_HTTP.'assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="'.RUTA_HTTP.'assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="'.RUTA_HTTP.'assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="'.RUTA_HTTP.'assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="'.RUTA_HTTP.'assets/dist/css/skins/_all-skins.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        ';
        return $css;
    }

    private function GenerateJS($script = ''){
        $js = '
        <!-- jQuery 3 -->
        <script src="'.RUTA_HTTP.'assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="'.RUTA_HTTP.'assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="'.RUTA_HTTP.'assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="'.RUTA_HTTP.'assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="'.RUTA_HTTP.'assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="'.RUTA_HTTP.'assets/dist/js/demo.js"></script>
        <script src="'.RUTA_HTTP.'js/active-menu.js"></script>
        '.$script.'
        <script>
            $(document).ready(function () {
                $(".sidebar-menu").tree()
            })
        </script>
        ';
        return $js;
    }

    private function GenerateHeaderContent($nombre = ''){
        $hc = '
        <header class="main-header">
    <!-- Logo -->
    <a href="'.RUTA_HTTP.'" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Architecture</b>Store</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="'.RUTA_HTTP.'assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">'.$nombre.'</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="'.RUTA_HTTP.'assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  '.$nombre.' <!-- Web Developer -->
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!--<div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>-->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="'.RUTA_HTTP.'index/usuario/Salir" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- =============================================== -->
        ';
        return $hc;
    }

    private function GenerateSidebar($nombre = ''){
        $sb = '
        <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="'.RUTA_HTTP.'assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>'.$nombre.'</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>-->
        <li><a href="'.RUTA_HTTP.'"><i class="fa fa-book"></i> <span>Productos</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->';
        return $sb;
    }

    private function GenerateFooter(){
        $ftr = '
        <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 Brivalia. Desarrollado por alumnos de la <a href="www.utmetropolitana.edu.mx">UTM</a>.</strong> Derechos reservados.
  </footer>';
        return $ftr;
    }

    private function GenerateSidebarControl(){
        $sc = '
         <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar\'s background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
        ';
        return $sc;
    }

    private function GenerateHeader($nombre = '', $title = ''){
        $hd = '
        <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.: Architecture :.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  '.$this->GenerateCSS().'
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    '.$this->GenerateHeaderContent($nombre).'
    '.$this->GenerateSidebar($nombre).'

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>'.$title.'</h1>
      </section>
      <section class="content">
        <div class="box" id="content">
        ';
        return $hd;
    }

    private function GenerateBottom($script = ''){
        $btm = '
        
        </div>
        </section>
        <!-- /.content -->
  </div>
  '.$this->GenerateFooter().'
  '.$this->GenerateSidebarControl().'
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
'.$this->GenerateJS($script).'
</body>
</html>
        ';
        return $btm;
    }

    public function GetPage($nombre = '', $title = ''){
        return $this->GenerateHeader($nombre, $title);
    }

    public function GetFooter($script = ''){
        return $this->GenerateBottom($script);
    }

}