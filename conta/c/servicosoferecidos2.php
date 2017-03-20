<?php
session_start();
if(isset($_SESSION['idfreelancer'])){

  require_once 'includes/freelancer.php';
  $header=file_get_contents(realpath(dirname(__FILE__) . '/includes/header.php'));
  $menu=file_get_contents(realpath(dirname(__FILE__) . '/includes/menu.php'));
  $profissoes=file_get_contents(realpath(dirname(__FILE__) . '/includes/profissoes.html'));
  ?>         

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>F.ree > Perfil Profissional</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="materialize/materialize.css">

    <link rel="stylesheet" type="text/css" href="upload/css/component.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <script src="plugins/select2/select2.full.min.js"></script>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="pservices/css/component.css" />
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <link rel="stylesheet" type="text/css" href="modal/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="tables/css/component.css" />
    <!-- common styles -->
    <link rel="stylesheet" type="text/css" href="modal/css/dialog.css" />
    <!-- individual effect -->
    <link rel="stylesheet" type="text/css" href="modal/css/dialog-sandra.css" />
    <script src="modal/js/modernizr.custom.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">

  <div class="fixed-action-btn vertical" style="right: 24px;">
    <a class="btn-floating btn-large red" style="background-color:#008D4C" href="#" data-dialog="somedialog" data-toggle="modal" data-target=".bd-example-modal-lg">

      <i class="fa fa-fw fa-plus"></i>

    </a>
  </div>



  <!-- Site wrapper -->
  <div class="wrapper">

    <?php


    require_once 'includes/header.php';
    require_once 'includes/aside.php';

    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <section class="content-header">
        <h1>
          SERVIÇOS OFERECIDOS
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">


        <section class="pricing-section bg-8">

          <div class="pricing pricing--tashi">
            <?php 

            require_once '../php/class/servicos.class.php';

            $servicos=new servicos();
            $servicos->setIdFreelancer($idfreelancer);
            $resp=$servicos->buscarTodos();

            foreach ($resp as $row) {


              ?>
              <div class="pricing__item">
                <h3 class="pricing__title"><?php echo $row ['nomeservico'] ?></h3>
                <p class="pricing__sentence"><?php echo $row ['descricao'] ?></p>
                <div class="pricing__price"><span class="pricing__currency">R$ </span><?php echo $row ['preco'] ?><span class="pricing__period">/ <?php echo $row['tipo']?></span></div>
                <ul class="pricing__feature-list">
                  <li class="pricing__feature">1 GB of space</li>
                  <li class="pricing__feature">Support at $25/hour</li>
                  <li class="pricing__feature">Small social media package</li>
                </ul>
                <a href="alterarservico.php?id=<?php echo $row['idservico'] ?>">Alterar</a>
                <a style="align-self:flex-end;"href="../php/functions/excluirservico.php?idservico=<?php echo $row['idservico'] ?>"><button style="background-color:#D73925"class="pricing__action" aria-label="Purchase this plan"><i class="fa fa-fw fa-trash"></i></button></a>
              </div>

            <?php } ?>
            </div>
          </section>

          <?php 

          require_once '../php/class/servicos.class.php';

          $servicos=new servicos();
          $servicos->setIdFreelancer($idfreelancer);
          $resp=$servicos->buscarTodos();

          foreach ($resp as $row) {


            ?>
            <form action="../php/functions/alterarservico.php" method="POST">
              <input type="hidden" value="<?php echo $row['idservico'] ?>" name="idservico">
              <div class="row">
                <div class="col-md-3">
                  <small>Qual o serviços</small>
                  <input value="<?php echo $row ['nomeservico'] ?>"id="nomefreelancer" class="form-control input-lg" name="nomeservico" type="text" placeholder="Serviço">
                </div>
                <div class="col-md-3">
                  <small>Fale um pouco sobre</small>
                  <input value="<?php echo $row ['descricao'] ?>"id="nomefreelancer" class="form-control input-lg" name="descricao" type="text" placeholder="Serviço">
                </div>
                <div class="col-md-2">
                  <small>Quanto cobra?</small>
                  <input value="<?php echo $row ['preco'] ?>"id="nomefreelancer" class="form-control input-lg" name="preco" type="text" placeholder="Serviço">
                </div>
                <div class="col-md-2"><small>&nbsp;</small><button type="submit" class="btn btn-block btn-warning btn-lg"><i class="fa fa-fw fa-edit"></i> Editar</button></div>
                <div class="col-md-2"><small>&nbsp;</small><a href="../php/functions/excluirservico.php?idservico=<?php echo $row['idservico'] ?>"><button type="button" class="btn btn-block btn-danger btn-lg"><i class="fa fa-fw fa-trash"></i> Apagar</button></a></div>
              </div><br>
            </form>

            <?php
          }

          ?>

        </div>

      </div>
      <!-- /.box -->

    </section>

    <div id="somedialog" class="dialog">
      <div class="dialog__overlay"></div><h2><strong> </strong></h2><div><button class="action" data-dialog-close></button></div>
      <div class="dialog__content">

        <form method="POST" action="../php/functions/inserirservico.php">
          <input type="hidden" value="<?php echo $idfreelancer ?>" name="idfreelancer">
          <div class="row">
            <h1 style="text-align:center"></h1>
            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label for="nomefreelancer">Nome do Serviço</label>
                <input id="nomefreelancer" class="form-control input-lg" name="nomeservico" type="text" placeholder="Serviço">
              </div>
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label for="nomefreelancer">Breve Descrição | <small>Max 120 caractéres</small></label>
                <textarea maxlength="120" id="nomefreelancer" class="form-control input-lg" name="descricao" type="text" placeholder="Descrição do Serviço"></textarea>
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="nomefreelancer">Preço</label>
                <input id="nomefreelancer" class="form-control input-lg" name="preco" type="number" placeholder="R$">
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                  <label >Tipo</label>
                  <select name="tipo" class="form-control">
                    <option>Por Hora</option>
                    <option>Por Dia</option>
                    <option>Por Unidade</option>
                  </select>
                </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="input-group" style="width:100%;">
                <button type="submit" class="btn btn-block btn-success btn-lg">Adicionar</button>
              </div>
            </div>
          </div>

        </form>


      </div>
    </div>


    



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="upload/js/custom-file-input.js"></script>
<script src="modal/js/classie.js"></script>
<script src="modal/js/dialogFx.js"></script>
<!-- Page script -->
<script>
(function() {

  var dlgtrigger = document.querySelector( '[data-dialog]' ),
  somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
  dlg = new DialogFx( somedialog );

  dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );

})();
</script>
<script>
$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<script src="pservices/js/toucheffects.js"></script>
</body>
</html>
<?php

}else{ 
  header("location:../../login");
}
?>
