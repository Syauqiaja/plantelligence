<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webedulabcell</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'public/css/style.css'])
    <!-- Bootstrap JS (required for accordion) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-dark" style="overflow: hidden;">
    <div class="container-fluid p-0">

        <!-- Mobile Sidebar Toggle (Mobile only) -->
        <div id="mobileSidebarToggle" class="d-md-none bg-white border-bottom px-3 py-2 w-100">
            <div class="d-flex justify-content-between">
                <button class="btn btn-outline-primary" type="button" id="sidebarToggleBtn"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list fs-4"></i>
                </button>

                <a href="/" class="d-flex align-items-center link-primary text-decoration-none">
                    <i class="bi bi-mortarboard fs-2 me-2"></i>
                    <span class="fs-4 fw-bold">Plantelligence</span>
                </a>
            </div>
        </div>
        <!-- Sidebar Backdrop (Mobile only) -->
        <div class="sidebar-backdrop d-md-none" id="sidebarBackdrop"></div>

        <div class="d-flex">

            <!-- Sidebar Component -->
            <x-navigation.sidebar />

            <!-- Main Content -->
            <div class="flex-grow-1">
                {{ $slot }}
            </div>
        </div>

    </div>

    @stack('modals')
    @livewire('wire-elements-modal')

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.5/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/scrapooo/quill-resize-module@1.0.2/dist/quill-resize-module.js"></script>
    {{-- <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.5/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.5/js/responsive.bootstrap5.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/turn.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>

</html>