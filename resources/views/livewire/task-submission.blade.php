<div class="modal-content border-0 shadow-lg">
    <x-modal.modal-header>
        <div class="w-100 text-center text-white fw-bold">
            <h5 class="h4 text-center">Pengumpulan Tugas</h5>
        </div>
    </x-modal.modal-header>
    @if ($taskField)
        <form class="modal-body p-3" wire:submit='save'> @csrf
            <div class="task-container mt-3">
                <div class="d-flex">
                    <div class="flex-grow-1 ms-2">
                        {{ $taskField->title ?? $taskField->studentTask->title }}
                    </div>
                </div>
                <div class="mt-3">
                    <input class="form-control" type="file" wire:model='file'>
                    @if ($taskField->format)
                        <small class="mt-2">Format file : {{$taskField->format}}</small>
                    @endif
                </div>
            </div>
            @error('file')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <hr class="my-4">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success my-3 py-2 px-5 ms-auto" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    @endif
</div>