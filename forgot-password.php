<?php
session_start();
error_reporting(0);
include("include/config.php");

// Comprobación de detalles para restablecer la contraseña
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $query = mysqli_query($con, "SELECT id FROM users WHERE fullName='$name' AND email='$email'");
    $row = mysqli_num_rows($query);

    if ($row > 0) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header('location:reset-password.php');
    } else {
        echo "<script>alert('Detalles inválidos. Por favor, intenta con detalles válidos.');</script>";
        echo "<script>window.location.href ='forgot-password.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Recuperación de Contraseña - Paciente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f7fafc;
            font-family: 'Arial', sans-serif;
        }

        .main-login {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 50px auto;
        }

        .logo h2 {
            text-align: center;
            color: #17a2b8;
            margin-bottom: 20px;
        }

        .form-login .form-control {
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .form-actions {
            text-align: center;
        }

        .btn-primary {
            background-color: #17a2b8;
            border-color: #17a2b8;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #138496;
            border-color: #138496;
        }

        .new-account {
            text-align: center;
            margin-top: 20px;
        }

        .new-account a {
            color: #17a2b8;
            font-weight: bold;
            text-decoration: none;
        }

        .new-account a:hover {
            text-decoration: underline;
        }

        .copyright {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="main-login">
        <div class="logo">
            <h2>HMS | Recuperación de Contraseña</h2>
        </div>
        <form class="form-login" method="post">
            <fieldset>
                <legend>Recuperar Contraseña</legend>
                <p>Por favor, ingrese su nombre completo y correo electrónico registrados para continuar.</p>

                <input type="text" class="form-control" name="fullname" placeholder="Nombre Completo" required>
                <input type="email" class="form-control" name="email" placeholder="Correo Electrónico" required>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" name="submit">Restablecer Contraseña</button>
                </div>

                <div class="new-account">
                    ¿Ya tienes una cuenta? <a href="user-login.php">Inicia sesión</a>
                </div>
            </fieldset>
        </form>

        <div class="copyright">
            &copy; <?php echo date("Y"); ?> HMS. Todos los derechos reservados.
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
