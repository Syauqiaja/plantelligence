@props(['theme' => 'teal'])
<button data-bs-toggle="modal" data-bs-target="#taskSubmissionModal" class="btn btn-light text-{{ $theme }} rounded px-2 py-0" href="#" style="text-decoration: none;">
    <div class="d-flex align-items-center flex-column text-center">
        <div>
            <i class="bi bi-file-earmark-check fs-3"></i>
        </div>
        <div class="ms-2">
            Pengumpulan Tugas
        </div>
    </div>
</button>