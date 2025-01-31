<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
    $docspecialization=$_POST['Doctorspecialization'];
    $docname=$_POST['docname'];
    $docaddress=$_POST['clinicaddress'];
    $docfees=$_POST['docfees'];
    $doccontactno=$_POST['doccontact'];
    $docemail=$_POST['docemail'];
    $password=md5($_POST['npass']);
    $sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
    if($sql)
    {
        echo "<script>alert('Información del doctor agregada con éxito');</script>";
        echo "<script>window.location.href ='manage-doctors.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrador | Agregar Doctor</title>
        
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

        <style>
            body {
                background-color: #b2ebf2; /* Fondo celeste muy claro */
                font-family: 'Lato', sans-serif;
            }

            .app-content {
                background-color: #b2ebf2; /* Fondo de la app */
            }

            /* Animación de movimiento */
            @keyframes movePanel {
                0% { transform: translateX(0); }
                50% { transform: translateX(20px); }
                100% { transform: translateX(0); }
            }

            /* Panel de contenido con animación de movimiento */
            .panel-body {
                animation: movePanel 2s ease-in-out infinite; /* Animación suave */
                background-color: #ffffff;
                padding: 30px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                cursor: move;
            }

            .panel-heading {
                background-color: #00bcd4;
                color: white;
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
                text-align: center;
                font-size: 1.2em;
            }

            .form-control {
                border-radius: 5px;
                margin-bottom: 15px;
            }

            .btn-primary {
                background-color: #00bcd4;
                border-color: #00bcd4;
                color: white;
                padding: 10px 20px;
                font-size: 16px;
                border-radius: 5px;
                width: 100%;
            }

            .btn-primary:hover {
                background-color: #0288d1;
                border-color: #0288d1;
            }
        </style>

        <script type="text/javascript">
            function valid() {
                if(document.adddoc.npass.value != document.adddoc.cfpass.value) {
                    alert("Los campos de Contraseña y Confirmar Contraseña no coinciden.");
                    document.adddoc.cfpass.focus();
                    return false;
                }
                return true;
            }
        </script>

        <script>
            function checkemailAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'emailid=' + $("#docemail").val(),
                    type: "POST",
                    success: function(data) {
                        $("#email-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function () {}
                });
            }
        </script>
    </head>
    <body>
        <div id="app">
            <?php include('include/sidebar.php'); ?>
            <div class="app-content">
                <?php include('include/header.php'); ?>

                <!-- Contenido principal -->
                <div class="main-content">
                    <div class="wrap-content container" id="container">
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Administrador | Agregar Doctor</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><span>Administrador</span></li>
                                    <li class="active"><span>Agregar Doctor</span></li>
                                </ol>
                            </div>
                        </section>

                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row margin-top-30">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">Agregar Doctor</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                                                        <div class="form-group">
                                                            <label for="DoctorSpecialization">Especialización del Doctor</label>
                                                            <select name="Doctorspecialization" class="form-control" required="true">
                                                                <option value="">Seleccionar Especialización</option>
                                                                <?php 
                                                                    $ret = mysqli_query($con, "select * from doctorspecilization");
                                                                    while($row = mysqli_fetch_array($ret)) {
                                                                ?>
                                                                <option value="<?php echo htmlentities($row['specilization']);?>">
                                                                    <?php echo htmlentities($row['specilization']);?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="doctorname">Nombre del Doctor</label>
                                                            <input type="text" name="docname" class="form-control" placeholder="Ingrese el Nombre del Doctor" required="true">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="address">Dirección de la Clínica</label>
                                                            <textarea name="clinicaddress" class="form-control" placeholder="Ingrese la Dirección de la Clínica" required="true"></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="fess">Honorarios del Doctor</label>
                                                            <input type="text" name="docfees" class="form-control" placeholder="Ingrese los Honorarios del Doctor" required="true">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="fess">Número de Contacto</label>
                                                            <input type="text" name="doccontact" class="form-control" placeholder="Ingrese el Número de Contacto" required="true">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="fess">Correo Electrónico del Doctor</label>
                                                            <input type="email" id="docemail" name="docemail" class="form-control" placeholder="Ingrese el Correo Electrónico del Doctor" required="true" onBlur="checkemailAvailability()">
                                                            <span id="email-availability-status"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Contraseña</label>
                                                            <input type="password" name="npass" class="form-control" placeholder="Nueva Contraseña" required="required">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword2">Confirmar Contraseña</label>
                                                            <input type="password" name="cfpass" class="form-control" placeholder="Confirmar Contraseña" required="required">
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
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <?php include('include/footer.php'); ?>
            </div>
        </div>

        <!-- Main JavaScripts -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/modernizr/modernizr.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="vendor/switchery/switchery.min.js"></script>

        <!-- JavaScript para la página -->
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
