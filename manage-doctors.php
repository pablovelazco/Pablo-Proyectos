<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_GET['del']))
{
    mysqli_query($con,"delete from doctors where id = '".$_GET['id']."'");
    $_SESSION['msg']="¡Datos eliminados!";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Admin | Gestionar Doctores</title>

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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    
    <style>
        body {
            background-color: #b3e0ff; /* Celeste claro */
            font-family: 'Lato', sans-serif;
        }

        .sortable {
            cursor: move;
        }

        .table thead th {
            background-color: #66ccff; /* Resaltado en celeste */
            color: #ffffff;
        }

        .btn-transparent {
            border-color: #66ccff;
            color: #66ccff;
        }

        .btn-transparent:hover {
            background-color: #66ccff;
            color: #ffffff;
        }

        .table-hover tbody tr:hover {
            background-color: #d9f0ff;
        }

        .panel-white {
            border: 1px solid #66ccff;
        }

        .panel-heading {
            background-color: #66ccff;
            color: white;
            font-size: 18px;
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

                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Gestionar Doctores</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Gestionar Doctores</span>
                                </li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Gestionar <span class="text-bold">Doctores</span></h5>
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Especialización</th>
                                            <th class="hidden-xs">Nombre del Doctor</th>
                                            <th>Fecha de Creación</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable-table">
                                        <?php
                                        $sql = mysqli_query($con, "select * from doctors");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                        ?>

                                            <tr class="sortable">
                                                <td class="center"><?php echo $cnt; ?>.</td>
                                                <td class="hidden-xs"><?php echo $row['specilization']; ?></td>
                                                <td><?php echo $row['doctorName']; ?></td>
                                                <td><?php echo $row['creationDate']; ?></td>
                                                <td>
                                                    <a href="edit-doctor.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                                                    <a href="manage-doctors.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('¿Estás seguro de que quieres eliminarlo?')" class="btn btn-transparent btn-xs"><i class="fa fa-times"></i> Eliminar</a>
                                                </td>
                                            </tr>

                                        <?php
                                            $cnt++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('include/footer.php'); ?>

        <?php include('include/setting.php'); ?>

    </div>

    <script>
        // Inicialización de Sortable.js
        var sortable = new Sortable(document.getElementById('sortable-table'), {
            animation: 150,
            handle: '.sortable',
            onEnd: function (evt) {
                console.log('Elemento movido: ', evt);
            }
        });
    </script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-elements.js"></script>

    <script>
        jQuery(document).ready(function () {
            Main.init();
            FormElements.init();
        });
    </script>

</body>

</html>
