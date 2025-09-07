<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plantelligence</title>
    <!-- Vite: SCSS and JS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- External CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Tailwind CSS for Livewire Toaster -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-dark p-0">
    <div class="h-100 flex align-items-center justify-content-center">
        @yield('content')
    </div>
</body>

</html>