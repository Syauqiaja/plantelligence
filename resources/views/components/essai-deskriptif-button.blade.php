@auth
    <button href="{{ route('essai.detail') }}" class="btn btn-white text-white rounded" style="text-decoration: none;">
@else
    <button data-bs-toggle="modal" data-bs-target="#authModal" class="btn btn-white text-white rounded" style="text-decoration: none;">
@endauth
<div class="d-flex align-items-center">
    <div>
            <i class="bi bi-journal-text fs-1"></i>
        </div>
        <div class="ms-2 text-start">
            Essay Deskriptif <br>
            <small style="opacity: 0.7;">Tugas Wajib</small>
        </div>
    </div>
</button>