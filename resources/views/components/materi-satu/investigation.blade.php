@php
    $pageTitle = 'Materi 1: Air dan Sel Tumbuhan';
@endphp
<div class="bg-teal text-white">
    <div class="position-relative h-100 w-100">
        <div class="p-5 h-100 d-flex flex-column">
            <div>
                <div class="row">
                    <div class="col-9">
                        <h6 class="bg-white rounded text-teal px-3 py-1">
                            2: Investigation
                        </h6>
                        Eksperimen simulasi osmosis Kajian artikel tentang potensial air dan turgor
                    </div>
                </div>
                <div class="mt-3">
                    <div class="fw-bold">
                        Bantuan AI: validasi informasi
                    </div>
                    <a class="d-block ms-3 text-white mt-1" href="#" style="text-decoration: none;">
                        <i class="bi bi-file-earmark-fill"></i> LKM 3: Hasil investigasi + referensi ilmiah
                    </a>
                </div>
            </div>

            <div class="mb-2 flex-grow-1 d-flex flex-column justify-content-end align-items-end">
                <div class="text-center" style="width: 128px;">
                    Butuh bantuan?

                    <x-plantelligence-button-ai/>
                </div>
            </div>
        </div>
        <div class="position-absolute" style="bottom:12px; left: 16px;">
            <small>{{$pageTitle}}</small>
        </div>
    </div>
</div>