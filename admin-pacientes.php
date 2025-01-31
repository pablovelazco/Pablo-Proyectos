<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

// Mensaje de consulta terminada
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "<script>alert('Consulta terminada exitosamente');</script>";
} elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
    echo "<script>alert('Hubo un error al terminar la consulta');</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Doctor | Administrar Pacientes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f7fafc;
            font-family: Arial, sans-serif;
        }
        .main-content {
            margin: 20px auto;
            max-width: 1000px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .mainTitle {
            font-size: 24px;
            color: #17a2b8;
        }
        .table {
            margin-top: 20px;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        .table th {
            text-align: left;
            background-color: #17a2b8;
            color: #ffffff;
            padding: 10px;
            border-radius: 6px 6px 0 0;
        }
        .table td {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .btn-action {
            margin: 0 5px;
            padding: 5px 10px;
        }
        .btn-inactive {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1 class="mainTitle">Doctor | Administrar Pacientes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Paciente</th>
                    <th>Número de Contacto</th>
                    <th>Género</th>
                    <th>Fecha de Reserva</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $docid = $_SESSION['id'];
                $sql = mysqli_query($con, "SELECT * FROM tblpatient WHERE Docid='$docid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($sql)) {
                    $estado = $row['Estado'] == 'Inactivo' ? 'Inactivo' : 'Activo';
                    $btnClass = $estado == 'Inactivo' ? 'btn-inactive' : 'btn-success';
                ?>
                <tr>
                    <td><?php echo $cnt++; ?>.</td>
                    <td><?php echo $row['PatientName']; ?></td>
                    <td><?php echo $row['PatientContno']; ?></td>
                    <td><?php echo $row['PatientGender']; ?></td>
                    <td><?php echo $row['CreationDate']; ?></td>
                    <td>
                        <?php if ($estado == 'Activo') { ?>
                            <button class="btn btn-success btn-action btn-toggle-state"
                                data-id="<?php echo $row['ID']; ?>">
                                Activo
                            </button>
                        <?php } else { ?>
                            <button class="btn btn-inactive btn-action" disabled>Inactivo</button>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.btn-toggle-state').on('click', function () {
                var button = $(this);
                var patientId = button.data('id');

                // Llamada AJAX para actualizar el estado
                $.ajax({
                    url: '', // Esta misma página maneja la lógica
                    type: 'POST',
                    data: { update_state: true, patient_id: patientId },
                    success: function (response) {
                        try {
                            var result = JSON.parse(response);
                            if (result.status === 'success') {
                                // Cambiar el estado en la interfaz
                                button.removeClass('btn-success').addClass('btn-inactive').prop('disabled', true).text('Inactivo');
                            } else {
                                alert('Error: ' + result.message);
                            }
                        } catch (e) {
                            alert('Error inesperado: ' + response);
                        }
                    },
                    error: function () {
                        alert('Error al procesar la solicitud.');
                    }
                });
            });
        });
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_state']) && isset($_POST['patient_id'])) {
        $patientId = intval($_POST['patient_id']);

        // Actualizar el estado del paciente a "Inactivo"
        $query = "UPDATE tblpatient SET Estado = 'Inactivo' WHERE ID = $patientId";
        if (mysqli_query($con, $query)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se pudo actualizar el estado.']);
        }
        exit;
    }
    ?>
</body>
</html>

