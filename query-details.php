<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

// Actualizar comentario del administrador
if(isset($_POST['update'])) {
    $qid = intval($_GET['id']);
    $adminremark = $_POST['adminremark'];
    $isread = 1;
    $query = mysqli_query($con, "UPDATE tblcontactus SET AdminRemark='$adminremark', IsRead='$isread' WHERE id='$qid'");
    if ($query) {
        echo "<script>alert('Comentario del administrador actualizado con éxito.');</script>";
        echo "<script>window.location.href ='read-query.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administrador | Detalles de Consulta</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #87CEFA, #B0E0E6);
        }
        .main-content {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .btn-primary {
            background: #007BFF;
            border: none;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        h1, h5 {
            color: #333;
        }
        table {
            width: 100%;
            background: #f9f9f9;
            border-radius: 5px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
<div id="app">
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">
        <?php include('include/header.php'); ?>
        <div class="main-content container mt-4">
            <h1 class="mainTitle">Administrador | Detalles de Consulta</h1>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h5 class="over-title">Gestionar <span class="text-bold">Detalles de Consulta del paciente o el doctor</span></h5>
                    <table class="table table-bordered">
                        <tbody>
                            <?php
                            $qid = intval($_GET['id']);
                            $sql = mysqli_query($con, "SELECT * FROM tblcontactus WHERE id='$qid'");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <th>Nombre Completo Del paciente</th>
                                <td><?php echo $row['fullname']; ?></td>
                            </tr>
                            <tr>
                                <th>Correo Electrónico del paciente</th>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Número de Contacto del paciente</th>
                                <td><?php echo $row['contactno']; ?></td>
                            </tr>
                            <tr>
                                <th>Mensaje</th>
                                <td><?php echo $row['message']; ?></td>
                            </tr>
                            <?php if ($row['AdminRemark'] == "") { ?>
                            <form name="query" method="post">
                                <tr>
                                    <th>Comentario del Administrador</th>
                                    <td><textarea name="adminremark" class="form-control" required></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
                                    </td>
                                </tr>
                            </form>
                            <?php } else { ?>
                            <tr>
                                <th>Comentario del Administrador</th>
                                <td><?php echo $row['AdminRemark']; ?></td>
                            </tr>
                            <tr>
                                <th>Última Fecha de Actualización</th>
                                <td><?php echo $row['LastupdationDate']; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
