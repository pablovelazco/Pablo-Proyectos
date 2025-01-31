<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Informes entre fechas | Administrador</title>
    
    <!-- Fuentes de Google -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    
    <!-- Estilos de Bootstrap y otros -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <style>
      /* Fondo celeste */
      body {
        background-color: #E0F7FA;
      }
      
      .table {
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-top: 30px;
      }
      
      .table th, .table td {
        text-align: center;
        padding: 15px;
      }
      
      .mainTitle {
        font-size: 2em;
        color: #0277BD;
      }
      
      .breadcrumb {
        background-color: #0277BD;
        color: #fff;
      }

      .breadcrumb a {
        color: #fff;
      }

      .breadcrumb .active {
        color: #FFC107;
      }

      .alert {
        font-size: 1.1em;
      }

      .panel-title {
        font-size: 1.5em;
        color: #0277BD;
      }

      .form-group label {
        font-weight: bold;
        color: #0277BD;
      }

      .btn-primary {
        background-color: #0277BD;
        border-color: #0277BD;
      }

      .btn-primary:hover {
        background-color: #01579B;
        border-color: #01579B;
      }
    </style>
  </head>
  <body>
    <div id="app">
      <?php include('include/sidebar.php'); ?>
      <div class="app-content">
        <?php include('include/header.php'); ?>

        <div class="main-content">
          <div class="wrap-content container" id="container">
            <!-- Título de la página -->
            <section id="page-title">
              <div class="row">
                <div class="col-sm-8">
                  <h1 class="mainTitle">Informes entre Fechas</h1>
                </div>
                <ol class="breadcrumb">
                  <li><span>Informes entre Fechas</span></li>
                  <li class="active"><span>Informes</span></li>
                </ol>
              </div>
            </section>

            <!-- Formulario de selección de fechas -->
            <div class="container-fluid container-fullw bg-white">
              <div class="row">
                <div class="col-md-12">
                  <div class="row margin-top-30">
                    <div class="col-lg-8 col-md-12">
                      <div class="panel panel-white">
                        <div class="panel-heading">
                          <h5 class="panel-title">Informes entre Fechas</h5>
                        </div>
                        <div class="panel-body">
                          <form role="form" method="post" action="betweendates-detailsreports.php">
                            <div class="form-group">
                              <label for="fromdate">Fecha Desde:</label>
                              <input type="date" class="form-control" name="fromdate" id="fromdate" required="true">
                            </div>

                            <div class="form-group">
                              <label for="todate">Fecha Hasta:</label>
                              <input type="date" class="form-control" name="todate" id="todate" required="true">
                            </div>
                            
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">
                              Enviar
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12">
                  <div class="panel panel-white">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie de página -->
      <?php include('include/footer.php'); ?>

      <!-- Configuración -->
      <?php include('include/setting.php'); ?>
    </div>

    <!-- Scripts principales -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>

    <!-- Scripts para esta página -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

    <!-- Inicialización de scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-elements.js"></script>
    <script>
      jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
      });
    </script>
  </body>
</html>
