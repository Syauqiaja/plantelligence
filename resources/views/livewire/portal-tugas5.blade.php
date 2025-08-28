<div class="bg-white">
    <div class="position-relative h-100 w-100">
        <div class="h-100 w-100 p-3 d-flex flex-column gap-2" style="width: 100%;">
            <div>
                <div class="mt-4">
                    <div class="w-100 d-flex flex-column gap-5">
                        @foreach ($tasks as $index => $task)
                        <div>
                            <livewire:task-assignment-field :studentTask="$task" :number="$index + 1"
                                :key='$task->id' />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex-grow-1 mb-5 border rounded">
                <iframe src="https://www.chatbase.co/chatbot-iframe/IT7tdSKVjb-hzFzFEhfZh" width="100%"
                    height="100%"></iframe>
            </div>
        </div>
        <div class="position-absolute" style="bottom:12px; right: 16px;">
            <small>{{$pageTitle}}</small>
        </div>
    </div>
</div>