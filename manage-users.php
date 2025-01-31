<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_GET['del'])) {
    if (isset($_GET['id'])) {
        mysqli_query($con, "delete from users where id = '" . $_GET['id'] . "'");
        $_SESSION['msg'] = "¡Datos eliminados!";
    } else {
        $_SESSION['msg'] = "ID no válido para eliminar.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Admin | Gestionar Usuarios</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

    <!-- Estilos adicionales -->
    <style>
        /* Fondo celeste de toda la página */
        body {
            background-color: #E0F7FA; /* Celeste claro */
            color: black; /* Texto oscuro para contraste */
        }

        /* Fondo blanco para contenedores */
        .container-fullw {
            background-color: white;
        }

        /* Color celeste para botones y textos */
        .btn-celeste {
            background-color: #00bcd4;
            color: white;
            border: none;
        }

        .btn-celeste:hover {
            background-color: #0097a7;
            color: white;
        }

        /* Títulos en color celeste */
        .mainTitle {
            color: #00bcd4;
        }

        /* Bordes celestes en la tabla */
        .table th, .table td {
            border: 1px solid #00bcd4;
        }

        /* Fondo celeste en la tabla */
        .bg-celeste {
            background-color: #b2ebf2;
        }

        /* Botón de eliminar con color celeste */
        .btn-transparent.btn-xs {
            color: #00bcd4;
        }

        .btn-transparent.btn-xs:hover {
            background-color: #b2ebf2;
            color: #0097a7;
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
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Gestionar Usuarios</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Gestionar Usuarios</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Gestionar <span class="text-bold">Usuarios</span></h5>
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <table class="table table-hover bg-celeste" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Nombre Completo</th>
                                            <th class="hidden-xs">Dirección</th>
                                            <th>Ciudad</th>
                                            <th>Género</th>
                                            <th>Email</th>
                                            <th>Fecha de Registro</th>
                                            <th>Fecha de Actualización</th>
                                            <th>Acción</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($con, "select * from users");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                        ?>

                                            <tr>
                                                <td class="center"><?php echo $cnt; ?>.</td>
                                                <td class="hidden-xs"><?php echo $row['fullName']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['city']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['regDate']; ?></td>
                                                <td><?php echo $row['updationDate']; ?></td>
                                                <td>
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <a href="manage-users.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('¿Estás seguro de que deseas eliminar?')" class="btn btn-celeste btn-xs tooltips" tooltip-placement="top" tooltip="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
                                                    </div>
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

        <!-- start: FOOTER -->
        <?php include('include/footer.php'); ?>
        <!-- end: FOOTER -->

        <!-- start: SETTINGS -->
        <?php include('include/setting.php'); ?>
        <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
        });
    </script>
</body>

</html>
