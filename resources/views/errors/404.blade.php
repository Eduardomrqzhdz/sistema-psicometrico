<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página no encontrada</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Puedes incluir tu propia hoja de estilos aquí -->
</head>
<body class="bg-gray-100 font-sans">

<div class="h-screen flex items-center justify-center">
    <div class="text-center">
        <div class="text-6xl font-bold text-blue-900">404</div>
        <p class="text-2xl text-green-700 mb-4">
            ¡Ups! Parece que te has perdido.
        </p>
        <p class="text-green-700">
            La página que estás buscando podría haber sido eliminada o no está disponible temporalmente.
        </p>
        <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-blue-900 text-white px-6 py-3 rounded-md transition duration-300 hover:bg-blue-800">
            Ir al Inicio
        </a>
    </div>
</div>

</body>
</html>

