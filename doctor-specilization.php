<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
    $doctorspecilization = $_POST['doctorspecilization'];

    // Validar que el campo no esté vacío
    if (empty($doctorspecilization)) {
        $_SESSION['msg'] = "¡Por favor, ingrese una especialización!";
    } else {
        // Verificar si la especialización ya existe en la base de datos
        $sql = mysqli_query($con, "SELECT * FROM doctorSpecilization WHERE specilization = '$doctorspecilization'");
        
        if (mysqli_num_rows($sql) > 0) {
            // Si ya existe, mostrar un mensaje de error
            $_SESSION['msg'] = "¡Esta especialización ya está registrada!";
        } else {
            // Si no existe, insertarla en la base de datos
            $sql = mysqli_query($con, "INSERT INTO doctorSpecilization(specilization) VALUES('$doctorspecilization')");
            $_SESSION['msg'] = "¡Especialización del doctor agregada con éxito!";
        }
    }
}

if (isset($_GET['del'])) {
    mysqli_query($con, "DELETE FROM doctorSpecilization WHERE id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = "¡Datos eliminados!";
    header("Location: doctor-specilization.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Admin | Especialización del Doctor</title>

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

        .error-message {
            color: red;
            font-size: 14px;
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
                                <h1 class="mainTitle">Admin | Agregar Especialización del Doctor</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Agregar Especialización del Doctor</span>
                                </li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row margin-top-30">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Especialización del Doctor</h5>
                                            </div>
                                            <div class="panel-body">
                                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                                <form role="form" name="dcotorspcl" method="post" id="specializationForm">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            Especialización del Doctor
                                                        </label>
                                                        <input type="text" name="doctorspecilization" id="doctorspecilization" class="form-control" placeholder="Ingrese la Especialización del Doctor">
                                                    </div>

                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                        Enviar
                                                    </button>

                                                    <div class="error-message" id="error-message"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="over-title margin-bottom-15">Administrar <span class="text-bold">Especializaciones del Doctor</span></h5>

                                    <table class="table table-hover" id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Especialización</th>
                                                <th class="hidden-xs">Fecha de Creación</th>
                                                <th>Fecha de Actualización</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sortable-table">
                                            <?php
                                            $sql = mysqli_query($con, "select * from doctorSpecilization");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>

                                                <tr class="sortable">
                                                    <td class="center"><?php echo $cnt; ?>.</td>
                                                    <td class="hidden-xs"><?php echo $row['specilization']; ?></td>
                                                    <td><?php echo $row['creationDate']; ?></td>
                                                    <td><?php echo $row['updationDate']; ?>
                                                    </td>

                                                    <td>
                                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                            <a href="edit-doctor-specialization.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Editar"><i class="fa fa-pencil"></i></a>

                                                            <a href="doctor-specilization.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('¿Estás seguro de que deseas eliminar?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
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
        </div>

        <?php include('include/footer.php'); ?>
        <?php include('include/setting.php'); ?>

    </div>

    <script>
        // Función para validar el formulario antes de enviarlo
        document.getElementById('specializationForm').addEventListener('submit', function(event) {
            var doctorspecilization = document.getElementById('doctorspecilization').value;
            var errorMessage = document.getElementById('error-message');
            
            // Si el campo está vacío, evitar el envío y mostrar el error
            if (doctorspecilization.trim() === '') {
                errorMessage.textContent = '¡Por favor, ingrese una especialización!';
                event.preventDefault();
                return false;
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
