<div class="w-100 d-flex justify-content-center">
    <div class="w-100 d-flex flex-column mx-2" style="max-width: 800px;">
        <div id="user-info" class="w-100 bg-white mt-md-5 mt-sm-2 rounded p-2 d-flex align-items-center shadow"
            style="position: sticky; top: 8px; z-index: 1030;">
            <div class="flex-grow-1 d-flex align-items-center">
                <img class="rounded-circle" src="{{ asset('images/image_placeholder.jpeg') }}"
                    style="height: 64px; width: 64px;" />
                <div class="ms-3">
                    <span class="h5 fw-bold">
                        Halo {{ Auth::user()->name }}
                    </span>
                    <br>
                    Mater 1 : Anjay Sebuah ANJAAYY
                </div>
            </div>
            <div>
                <button class="btn btn-outline-primary">Kembali Ke Flipbook</button>
            </div>
        </div>
        <div class="bg-white rounded w-100 my-2 p-3">
            <h2 class="h2 text-center mt-2">Essai Deskriptif</h2>

            @foreach ([1,2,3,4] as $question)
            <div class="mt-3 d-flex flex-row w-100">
                <div>
                    <div class="bg-dark rounded text-white text-center h4 d-flex align-items-center justify-content-center"
                        style="height: 48px; width: 48px;">
                        <div>
                            {{ $question }}
                        </div>
                    </div>
                </div>
                <div class="esai-question flex-grow-1 ms-3">
                    <div>
                        Lorem ipsum dolor sit amet consectetur adipisicing liquam quod debitis aperiam vel. Suscipit qui
                        aperiam, eligendi deserunt enim error?
                    </div>
                    <div class="mt-3">
                        <textarea class="form-control" name="" id="" style="min-height: 250px;"></textarea>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="d-flex justify-content-end">
                <button class="btn btn-success my-3 py-2 px-5 ms-auto">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>