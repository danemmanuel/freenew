<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

          <div class="pull-left image">
            <?php

            require_once '../php/class/cliente.class.php';
            $cliente2= new cliente();

            $cliente2->setId($_SESSION['idcliente']);
            $resp=$cliente2->buscarId();
            $avatar=$resp['urlavatar'];
            $nomecliente=$resp['nome'];
            

            ?>


            <img src="<?php echo $avatar ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $nomecliente; ?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> LOGADO</a>

          </div>
        </div>

        <!-- Left side column. contains the sidebar -->
       

    <ul class="sidebar-menu">
      <li class="header">MINHA CONTA</li>
      <li class="treeview">

        <a href="#">
          <i class="fa fa-user"></i> <span>Conta</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php"><i class="fa fa-edit"></i> Dados Pessoais</a></li>
          <li><a href="avatar.php"><i class="fa fa-picture-o"></i> Trocar Avatar</a></li>
          <li><a href="alterarsenha.php"><i class="fa fa-key"></i> Alterar Senha</a></li>
          <li><a href="excluirconta.php"><i class="fa fa-times"></i> Excluir Conta</a></li>
        </ul>
      </li>

      <li>
        <a href="projetos.php">
          <i class="fa fa-envelope"></i> <span>Projetos</span>
       <span class="label label-primary pull-right">
         <?php 
          require_once '../php/class/mensagem.class.php';

          $mensagem= new mensagem();
          $mensagem->setIdCliente($_SESSION['idcliente']);
          $mensagem->somarCliente();

          ?>
          </span>
        </a>
      </li>
      

      <li>
        <a href="sair.php">
          <i class="fa fa-sign-out"></i> <span>Sair</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

    </ul>

      </section>
      <!-- /.sidebar -->
    </aside>