<?php
session_start();
if(isset($_SESSION['idfreelancer'])){

  require_once 'includes/freelancer.php';

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

    
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <?php  
        if ($telefone==NULL) {
          ?>
          <div class="alert alert-danger alert-dismissible" style="width:100%">
            <button type="button" class="close" data-dismiss="alert" style="font-size:30px" aria-hidden="true">&times;</button>
            <h4 style="text-align:center;padding-top:10px;font-size:25px;"> Complete seus dados pessoais</h4>
          </div>
          <?php
        }
        ?>  

        <form method="POST" action="../php/functions/alterarfreelancer.php">
          <input type="hidden" name="idfreelancer" value="<?php echo $idfreelancer ?>">
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="nomefreelancer">Seu Nome</label>
                <input required id="nomefreelancer"  pattern="[a-z A-Z]+" class="form-control input-lg" name="nomefreelancer" type="text" placeholder="Seu Nome" value="<?php echo $nomefreelancer?>">
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="nomefreelancer">Seu Email</label>
                <input disabled id="email" class="form-control input-lg" type="text" placeholder="Seu Email" value="<?php echo $email ?>">
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label>Data Nascimento</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input required type="text" class="form-control input-lg" value="<?php echo $datanova ?>"name="datanascimento" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask>

                </div>
                <!-- /.input group -->
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label>Gênero</label><br>

                <?php 

                if ($sexo=='masculino') { ?>

                <label for="masculino">Masculino</label>
                <input type="radio" name="sexo" class="flat-red" value="masculino" id="masculino" checked>
                <label for="feminino">Feminino</label>
                <input type="radio" class="flat-red" name="sexo" value="feminino" id="feminino">

                <?php

              }





              else{ ?>

              <label for="masculino">Masculino</label>
              <input type="radio" name="sexo" class="flat-red" value="masculino" id="masculino">
              <label for="feminino">Feminino</label>
              <input type="radio" class="flat-red" name="sexo" value="feminino" id="feminino" checked>

              <?php
            }
            ?>






          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6 col-xs-12">
          <label for="telefone">Celular</label> <small>(Whatsapp)</small>
          <div class="input-group">

            <div class="input-group-addon">
              <i class="fa fa-phone"></i>
            </div>
            <input id="telefone" type="text" class="form-control input-lg" name="telefone" value="<?php echo $telefone?>" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
          </div>
        </div>


        <input id="telefone" type="hidden" class="form-control input-lg"  data-inputmask='"mask": "(99) 99999-9999"' data-mask>


      </div></br>
      <div class="row">
        <div class="col-md-6">
          <div class="input-group">
            <button type="submit" class="btn btn-block btn-success btn-lg">Salvar</button>
          </div>
        </div>
      </div>

    </form>

    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

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
  header("location:../../login/f");
}
?>
