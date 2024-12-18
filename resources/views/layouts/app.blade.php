<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <!-- Agrega tus archivos CSS aquí -->
</head>

<body>

    <div class="container-scroller">
        @include('partials.sidebar')
        <div class="container-fluid page-body-wrapper">
            <!-- Navbar -->
            @include('partials.navbar')
            <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>

        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Agrega tus scripts JS aquí -->
</body>

</html>