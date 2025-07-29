<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen p-6">

<div class="container mx-auto space-y-6 md:px-16">
    <h1 class="text-2xl font-bold text-center mb-4">Gestion des tâches</h1>
    @yield('content')
</div>
</body>
</html>
