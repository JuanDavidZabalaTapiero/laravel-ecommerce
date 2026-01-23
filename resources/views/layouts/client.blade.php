<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce - @yield('title')</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">
    <header>
        <x-client.nav />
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

</body>

</html>
