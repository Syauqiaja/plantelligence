@php
    $pageTitle = 'Materi 2: Transpirasi';
@endphp
<div class="bg-blue text-white">
    <div class="position-relative h-100 w-100">
        <div class="p-5">
            <h4 class="text-center border-dashed py-2 rounded">
                MATERI 2 <br>
                TRANSPIRASI
            </h4>

            <div class="mt-4">
                <h6>List Penugasan : </h6>
                <div>
                    <input class="task-checkbox" type="checkbox" id="tugas-1" hidden>
                    <label for="tugas-1" class="task-wrapper">
                        <div class="custom-checkbox"></div>
                        <span class="task-label-text">Tugas Pertama</span>
                    </label>
                </div>
                <div class="mt-1">
                    <input class="task-checkbox" type="checkbox" id="tugas-2" hidden>
                    <label for="tugas-2" class="task-wrapper">
                        <div class="custom-checkbox"></div>
                        <span class="task-label-text">Tugas Kedua</span>
                    </label>
                </div>
                <div class="mt-1">
                    <input class="task-checkbox" type="checkbox" id="tugas-3" hidden>
                    <label for="tugas-3" class="task-wrapper">
                        <div class="custom-checkbox"></div>
                        <span class="task-label-text">Tugas Ketiga</span>
                    </label>
                </div>
            </div>
            <hr class="mx-2">
            <div class="row">
                <div class="col">
                    <h6 class="bg-white rounded text-blue px-3 py-1">
                        1: Orientation & Organization
                    </h6>
                    Kasus: “Daun tanaman tampak
                    mengering cepat di bawah sinar
                    matahari.
                </div>
                <div class="col-3 text-center">
                    <div class="d-flex justify-content-center">
                        <div style="aspect-ratio: 1;" class="p-2 bg-white rounded">
                            <img src="{{ asset('images/qr code.png') }}" alt="" style="height: 80px; width: 80px;">
                        </div>
                    </div>
                    <div class="mt-2">
                        Scan Me
                    </div>
                </div>
            </div>
            <hr class="mx-2">
            <h6 class="text-center">Sintaks PBL</h6>
            <div class="mt-3">
                <div class="">
                    <div class="fw-bold">
                        Mahasiswa menyusun dugaan awal
                    </div>
                    <a class="d-block ms-3 text-white mt-1" href="#" style="text-decoration: none;">
                        <i class="bi bi-file-earmark-fill"></i> LKM 6–7: Rumusan masalah + tim kerja
                    </a>
                </div>
            </div>

            <hr>

            <div class="mt-5">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-white text-white rounded" href="#" style="text-decoration: none;">
                        <div class="d-flex align-items-center">
                            <div>
                                <i class="bi bi-journal-text fs-1"></i>
                            </div>
                            <div class="ms-2 text-start">
                                Essay Deskriptif <br>
                                <small style="opacity: 0.7;">Tugas Wajib</small>
                            </div>
                        </div>
                    </a>

                    
                    <a class="btn btn-light text-blue rounded px-2 py-0" href="#" style="text-decoration: none;">
                        <div class="d-flex align-items-center flex-column text-center">
                            <div>
                                <i class="bi bi-file-earmark-check fs-3"></i>
                            </div>
                            <div class="ms-2">
                                Pengumpulan Tugas
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="position-absolute" style="bottom:12px; left: 16px;">
            <small>{{$pageTitle}}</small>
        </div>
    </div>
</div>