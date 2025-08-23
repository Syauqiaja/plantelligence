<div class="modal-content border-0 shadow-lg">
    <x-modal.modal-header>
        <div class="w-100 text-center text-white fw-bold">
            <h5 class="h4 text-center">Pengumpulan Tugas</h5>
        </div>
    </x-modal.modal-header>
    <div class="modal-body p-3">
        @foreach ([1,2,3,4] as $task)
            <div class="task-container mt-3">
                <div class="d-flex">
                    <div>
                        <x-number-box :height="40" :width="40">{{$task}}</x-number-box>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                </div>
                <div class="mt-1">
                    <input class="form-control" type="file" name="" id="">
                </div>
            </div>
            <hr class="my-4">
        @endforeach
        <div class="d-flex justify-content-end">
                <button class="btn btn-success my-3 py-2 px-5 ms-auto">
                    Simpan
                </button>
            </div>
    </div>
</div>