@php
$pageTitle = 'Materi 2: Transpirasi';
@endphp
<div class="bg-white">
    <div class="position-relative h-100 w-100">
        <div class="p-5" style="width: 100%;">
            <h5 class="text-blue py-1">Portal Tugas dan Uji Kompetensi</h5>
            <div>
                <h5 class="fw-bold my-3">
                    Translokasi Gula Tidak Hanya Turun, Tapi Juga Bisa Naik dan Menyamping!
                </h5>
                <div class="my-3">
                    <img class="rounded" src="https://i0.wp.com/ibbio.pbworks.com/f/translocation%20of%20sucrose.jpg"
                        alt="Placeholder untuk image ini" style="aspect-ratio: 1.8; width: 100%;">
                </div>
                <div class="mt-4">
                    <h6>List Penugasan : </h6>
                    <div>
                        <input class="task-checkbox" type="checkbox" id="tugas-1" hidden>
                        <label for="tugas-1" class="task-wrapper">
                            <div class="custom-checkbox"></div>
                            <span class="task-label-text">Angket Student Ownership of Learning Awal</span>
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
            </div>
        </div>
        <div class="position-absolute" style="bottom:12px; right: 16px;">
            <small>{{$pageTitle}}</small>
        </div>
    </div>
</div>