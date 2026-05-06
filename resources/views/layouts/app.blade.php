<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Productos</title>
            <p class="text-muted">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color:#f4f6f9;
        }

        .navbar{
            background: linear-gradient(90deg,#4f46e5,#6366f1);
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 4px 15px rgba(0,0,0,0.08);
        }

        .table{
            vertical-align: middle;
        }

        .btn-primary{
            background-color:#4f46e5;
            border:none;
        }

        .btn-primary:hover{
            background-color:#4338ca;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark mb-5">
        <div class="container">
        <div>
        <div class="d-flex align-items-center gap-3">

        <h4 class="navbar-brand mb-0">
            Sistema de Gestión de Productos
        </h4>

        <small class="text-white-50">
            Administra productos y categorías del sistema
        </small>

        </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>