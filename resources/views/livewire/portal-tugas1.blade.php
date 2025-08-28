<div class="bg-white">
    <div class="position-relative h-100 w-100">
        <div class="p-3" style="width: 100%;">
            <div>
                <h5 class="h5 text-center my-3">Portal Tugas dan Uji Kompetensi</h5>
                <div class="mt-4">
                    <div class="w-100 d-flex flex-column gap-5">
                        @foreach ($tasks as $index => $task)
                            <div >
                                <livewire:task-assignment-field :studentTask="$task" :number="$index + 1" :key='$task->id'/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute" style="bottom:12px; right: 16px;">
            <small>{{$pageTitle}}</small>
        </div>
    </div>
</div>