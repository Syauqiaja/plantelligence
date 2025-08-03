@php
$user = Illuminate\Support\Facades\Auth::user();
@endphp

<nav id="sidebarMenu" class="sidebar bg-white p-3" style="width: 256px; height: 100vh;">
  <div class="d-flex justify-content-between align-items-center">
    <a href="/" class="d-flex align-items-center mb-3 link-primary text-decoration-none d-none d-md-flex">
      <span class="fs-4 fw-bold">Plantelligence</span>
    </a>
    <!-- Close button for mobile -->
    <button class="btn btn-sm btn-outline-secondary d-md-none" id="sidebarCloseBtn" aria-label="Close sidebar">
      <i class="bi bi-x fs-5"></i>
    </button>
  </div>
  <hr class="d-none d-md-block">

  <ul class="nav nav-pills flex-column mb-auto mt-4 mt-md-0">
    <x-navigation.navlink :icon="'bi-house'">
      Cover
    </x-navigation.navlink>
  </ul>
</nav>