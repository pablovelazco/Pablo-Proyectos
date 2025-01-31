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
            font-family: 'Arial', sans-serif;
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
        .btn-danger {
            background-color: #dc3545;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1 class="mainTitle">Doctor | Administrar Pacientes</h1>

        <!-- Mensaje de éxito o error -->
        <div id="statusMessage"></div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Paciente</th>
                    <th>Número de Contacto</th>
                    <th>Género</th>
                    <th>Fecha de Reserva de la Cita y Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
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
                    <td><?php echo $cnt; ?>.</td>
                    <td><?php echo $row['PatientName']; ?></td>
                    <td><?php echo $row['PatientContno']; ?></td>
                    <td><?php echo $row['PatientGender']; ?></td>
                    <td><?php echo $row['CreationDate']; ?></td>
                    <td>
                        <?php if ($estado == 'Activo') { ?>
                            <button class="btn btn-success btn-action" data-toggle="modal" data-target="#activeModal" 
                                    data-id="<?php echo $row['ID']; ?>" data-name="<?php echo $row['PatientName']; ?>" 
                                    data-contact="<?php echo $row['PatientContno']; ?>" data-gender="<?php echo $row['PatientGender']; ?>">
                                Activo
                            </button>
                        <?php } else { ?>
                            <button class="btn btn-inactive btn-action" disabled>Inactivo</button>
                        <?php } ?>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-action deletePatient" data-id="<?php echo $row['ID']; ?>">Eliminar Paciente</button>
                    </td>
                </tr>
                <?php
                    $cnt++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de información del paciente -->
    <div class="modal fade" id="activeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información del Paciente</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p><strong>Nombre:</strong> <span id="patientName"></span></p>
                    <p><strong>Contacto:</strong> <span id="patientContact"></span></p>
                    <p><strong>Género:</strong> <span id="patientGender"></span></p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="finalize-attention.php">
                        <input type="hidden" name="patient_id" id="patientId">
                        <button type="submit" name="finalize" class="btn btn-danger">Terminar Consulta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
        // Eliminar paciente con AJAX
        $(document).on('click', '.deletePatient', function() {
            var patientId = $(this).data('id');
            var confirmation = confirm('¿Seguro que deseas eliminar a este paciente?');
            
            if (confirmation) {
                $.ajax({
                    url: 'admin-pacientes.php',
                    type: 'POST',
                    data: { id: patientId },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status == 'success') {
                            $('#statusMessage').html('<div class="alert alert-success">' + result.message + '</div>');
                            setTimeout(function() {
                                location.reload(); // Recarga la página para reflejar los cambios
                            }, 1500);
                        } else {
                            $('#statusMessage').html('<div class="alert alert-danger">' + result.message + '</div>');
                        }
                    }
                });
            }
        });

        // Modal de información del paciente
        $('#activeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var contact = button.data('contact');
            var gender = button.data('gender');
            var modal = $(this);
            modal.find('#patientId').val(id);
            modal.find('#patientName').text(name);
            modal.find('#patientContact').text(contact);
            modal.find('#patientGender').text(gender);
        });
    </script>
</body>
</html>
<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

// Eliminar paciente si se pasa el parámetro 'id' (vía AJAX)
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Eliminar el paciente de la base de datos
    $query = "DELETE FROM tblpatient WHERE ID = '$id'";

    if (mysqli_query($con, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Paciente eliminado correctamente']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el paciente']);
    }
    exit;
}
?>
