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

        <!-- Left side column. contains the sidebar -->
        <?php

        
        echo $menu;

        ?>
      </section>
      <!-- /.sidebar -->
    </aside>