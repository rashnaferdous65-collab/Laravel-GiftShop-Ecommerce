<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 font-sans text-gray-800">

    <!-- Page Wrapper -->
    <div class="flex min-h-screen flex-col items-center justify-center">

        <!-- Logo / Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-indigo-600">
                {{ config('app.name', 'Laravel') }}
            </h1>
        </div>

        <!-- Content Card -->
        <div class="w-full max-w-md rounded-xl bg-white p-6 shadow-lg">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="mt-6 text-sm text-gray-500">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>

    </div>

</body>
</html>

