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
    <title>Administrador | Registros de Sesiones de Usuario</title>
    
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
                  <h1 class="mainTitle">Administrador | Registros de Sesiones de Usuario</h1>
                </div>
                <ol class="breadcrumb">
                  <li><span>Administrador</span></li>
                  <li class="active"><span>Registros de Sesiones de Usuario</span></li>
                </ol>
              </div>
            </section>

            <!-- Tabla de registros -->
            <div class="container-fluid container-fullw bg-white">
              <div class="row">
                <div class="col-md-12">
                  <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                  <table class="table table-hover" id="sample-table-1">
                    <thead>
                      <tr>
                        <th class="center">#</th>
                        <th class="hidden-xs">ID de Usuario</th>
                        <th>Nombre de Usuario</th>
                        <th>IP del Usuario</th>
                        <th>Hora de Inicio</th>
                        <th>Hora de Salida</th>
                        <th>Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = mysqli_query($con, "SELECT * FROM userlog");
                      $cnt = 1;
                      while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <tr>
                          <td class="center"><?php echo $cnt; ?>.</td>
                          <td class="hidden-xs"><?php echo $row['uid']; ?></td>
                          <td class="hidden-xs"><?php echo $row['username']; ?></td>
                          <td><?php echo $row['userip']; ?></td>
                          <td><?php echo $row['loginTime']; ?></td>
                          <td><?php echo $row['logout']; ?></td>
                          <td>
                            <?php
                            if ($row['status'] == 1) {
                              echo "Éxito";
                            } else {
                              echo "Fallido";
                            }
                            ?>
                          </td>
                        </tr>
                      <?php
                        $cnt = $cnt + 1;
                      } ?>
                    </tbody>
                  </table>
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
