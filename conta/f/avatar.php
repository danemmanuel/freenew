<?php
session_start();
if(isset($_SESSION['idfreelancer'])){

require_once 'includes/freelancer.php';
 $header=file_get_contents(realpath(dirname(__FILE__) . '/includes/header.php'));
 $menu=file_get_contents(realpath(dirname(__FILE__) . '/includes/menu.php'));
 ?>         

 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>F.ree > Minha Conta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="upload/css/component.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/all.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <?php


    require_once 'includes/header.php';
    require_once 'includes/aside.php';

    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->


                <form action="recebeUpload.php" enctype="multipart/form-data" method="POST">
                  <div class="row form-group">
                    <input type="hidden" value="<?php echo $idfreelancer ?>" name="idfreelancer">

                  </div>

                  <div class="form-group" style="text-align:center">
                    <input type="file" name="arquivo" id="file-5" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
                    <label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Escolha seu Avatar&hellip;</span></label>
                  </div>

                  
                  <div class="col-md-12">
                  <div class="form-group" style="text-align:center">
                    <input type="submit" value="Enviar" class="btn btn-primary btn-lg" name="salvar">
                  </div>
                  </div>

                </form> 

            <!-- /.box -->

          </section>
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
<!-- Page script -->
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

</body>
</html>
<?php

}else{ 
  header("location:../../login");
}
?>
