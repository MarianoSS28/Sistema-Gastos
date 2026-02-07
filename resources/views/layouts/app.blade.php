<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistema de Gastos' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
    </style>
</head>
<body class="bg-body" style="background-image: url('{{ asset('assets/fondo.jpg') }}');">
    <!-- Contenido principal centrado verticalmente -->
    <div class="main-content-wrapper">
        <div class="w-full px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
            <div class="max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
    
    @livewireScripts
</body>
</html>