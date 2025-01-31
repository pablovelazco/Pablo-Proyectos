<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Guillermo Díaz de la Vega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('images/logo-background.png') center/cover no-repeat;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: rgba(52, 58, 64, 0.8);
            backdrop-filter: blur(5px);
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .hero {
            background: url('images/hospital.jpg') center/cover no-repeat;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }
        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .footer {
            background-color: rgba(52, 58, 64, 0.9);
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Hospital Guillermo Díaz de la Vega</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="hero">
        <div>
            <h1>Bienvenido al Hospital Guillermo Díaz de la Vega</h1>
            <p>Comprometidos con tu salud y bienestar</p>
        </div>
    </div>

    <!-- Sección de opciones -->
    <div class="container mt-5" style="margin-top: 100px !important;">
        <div class="row text-center justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <img src="images/grid-img3.png" class="card-img-top" alt="Pacientes">
                    <div class="card-body">
                        <h5 class="card-title">Pacientes</h5>
                        <p class="card-text">Regístrate y programa tu cita médica.</p>
                        <a href="hms/user-login.php" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <img src="images/grid-img1.png" class="card-img-top" alt="Médicos">
                    <div class="card-body">
                        <h5 class="card-title">Acceso de Médicos</h5>
                        <a href="hms/doctor/" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <img src="images/grid-img2.png" class="card-img-top" alt="Administración">
                    <div class="card-body">
                        <h5 class="card-title">Acceso Administrativo</h5>
                        <a href="hms/admin" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Hospital Guillermo Díaz de la Vega. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
