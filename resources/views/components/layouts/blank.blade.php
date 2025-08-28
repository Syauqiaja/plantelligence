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
    {{ $slot }}
    @stack('modals')
    <!-- External JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Fixed: Using consistent Quill.js version -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <!-- Alternative: More reliable CDN for quill-resize-module -->
    <script src="https://unpkg.com/quill-resize-module@3.0.1/dist/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/turn.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Blade/Vite Stack for Extra Scripts -->
    @stack('scripts')
</body>

</html>