<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

          <div class="pull-left image">
            <?php

            require_once '../php/class/freelancer.class.php';
            $freelancer2= new freelancer();

            $freelancer2->setId($_SESSION['idfreelancer']);
            $resp=$freelancer2->buscarId();
            $avatar=$resp['urlavatar'];
            $nomefreelancer=$resp['nome'];


            ?>


            <img src="<?php echo $avatar ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $nomefreelancer; ?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> LOGADO</a>

          </div>
        </div>

        

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
      <li><a target="" href="avatar.php"><i class="fa fa-picture-o"></i> Trocar Avatar</a></li>
      <li><a href="alterarsenha.php"><i class="fa fa-key"></i> Alterar Senha</a></li>
      <li><a href="excluirconta.php"><i class="fa fa-times"></i> Excluir Conta</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-suitcase"></i>
      <span>Perfil</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="perfilprofissional.php"><i class="fa fa-male"></i> Perfil Profissional</a></li>
      <li><a href="servicosoferecidos.php"><i class="fa fa-briefcase"></i> Meus Serviços</a></li>
      <li><a href="habilidades.php"><i class="fa fa-sliders"></i> Habilidades</a></li>
      <li><a href="resumo.php"><i class="fa fa-align-left"></i> Resumo</a></li>
      <li><a href="links.php"><i class="fa fa-link"></i> Links</a></li>

    </ul>
  </li>
  <li>
    <a href="mensagens.php">
      <i class="fa fa-envelope"></i> <span>Tickets</span>
      <span class="pull-right-container">
       <span class="label label-primary pull-right">
          <?php 

          require_once '../php/class/mensagem.class.php';
          $mensagem= new mensagem();
          $mensagem->setIdFreelancer($_SESSION['idfreelancer']);
          $mensagem->somar();
           ?>
           
            </span>

        
      </span>
    </a>
  </li>

  <li>
    <a href="historico.php">
      <i class="fa fa-suitcase"></i> <span>Histórico de Jobs</span>
      <span class="pull-right-container">
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