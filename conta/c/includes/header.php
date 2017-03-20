<?php 
require_once '../php/class/cliente.class.php';

$cliente=new cliente();
$idcliente=$_SESSION['idcliente'];
$cliente->setId($idcliente);
$result = $cliente->buscarId();

$nomecliente=$result['nome'];
$email=$result['email'];
$telefone=$result['telefone'];
$urlavatar=$result['urlavatar'];


?>

<header class="main-header">
  <!-- Logo -->
  <a href="../../" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Jobs</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Procurar</b> Jobs</span><br>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">

    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>


    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- Messages: style can be found in dropdown.less-->
      
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo $urlavatar ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $nomecliente ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo $urlavatar ?>" class="img-circle" alt="User Image">

              <p>
               <?php echo $nomecliente; ?>
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
       <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-paint-brush"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>