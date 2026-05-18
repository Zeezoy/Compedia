<!DOCTYPE html>
<html lang="en">
<head>
    @php
        use Illuminate\Support\Facades\Storage;
        use Illuminate\Support\Facades\Auth;
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compedia</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-[#07010F] text-white font-[Inter] min-h-screen flex flex-col">

    {{-- Navbar --}}
    <x-navbar/>

    {{-- Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    <x-footer/>

</body>
</html>