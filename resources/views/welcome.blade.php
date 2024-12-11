<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <h1 class="display-4">Bienvenido al Generador de Currículums</h1>
        <p class="lead mt-4">Crea, edita y descarga tus CVs de forma rápida y sencilla.</p>
        <div class="mt-5">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Registrarse</a>
        </div>
    </div>
</body>
</html>
