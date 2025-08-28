<div>
    <div class="d-flex gap-1">
        @if ($number != null)
        <div class="px-1 bg-blue text-white">
            <span class="m-2 text-start">{{$number}}</span>
        </div>
        @endif
        <div class="px-2 py-1 bg-blue text-white flex-grow-1">
            <span class="m-2 text-start">{{$studentTask->title}}</span>
        </div>
    </div>
    <div class="list-group mt-2">
        @if ($studentTask->file)
        <a @if (Auth::check()) href="{{ $studentTask->file }}" target="_blank" @else data-bs-toggle="modal"
            data-bs-target="#authModal" @endif
            class="list-group-item list-group-item-action list-group-item-primary d-flex align-items-center- justify-content-between">
            <div>
                <i class="bi bi-file-earmark-medical"></i> {{ basename($studentTask->file) }}
            </div>
            <div>
                <i class="bi bi-chevron-right"></i>
            </div>
        </a>
        @endif

        @if ($studentTask->file2)
        <a @if (Auth::check()) href="{{ $studentTask->file2 }}" target="_blank" @else data-bs-toggle="modal"
            data-bs-target="#authModal" @endif
            class="list-group-item list-group-item-action list-group-item-primary d-flex align-items-center- justify-content-between">
            <div>
                <i class="bi bi-file-earmark-medical"></i> {{ basename($studentTask->file2) }}
            </div>
            <div>
                <i class="bi bi-chevron-right"></i>
            </div>
        </a>
        @endif
        @foreach ($studentTask->taskFields as $taskField)
            @if ($taskField->url)
                
                <a @if (Auth::check()) href="{{ $taskField->url }}" target="_blank" wire:click='completeTask({{ $taskField->id }})' @else data-bs-toggle="modal" data-bs-target="#authModal" @endif class="list-group-item list-group-item-action d-flex">
                
                    @if ($taskField->studentAssignments->where('user_id', Auth::user()?->id)->first()?->is_completed)
                    <div class="bg-teal d-flex align-items-center justify-content-center"
                        style="height: 20px; width: 20px;">
                        <i class="bi bi-check fs-5 text-white"></i>
                    </div>
                    @else
                    <div class="border" style="height: 20px; width: 20px;"></div>
                    @endif

                    <div class="d-flex align-items-center gap-2">
                        <div class="ms-2 text-start fs-6">
                            {{ $taskField->title ?? 'Kerjakan Angket' }}
                        </div>
                        <i class="bi bi-box-arrow-up-right"></i>
                    </div>
                </a>
                @else
                    @if ($taskField->file)
                        <a @if (Auth::check()) href="{{ $taskField->file }}" target="_blank" @else data-bs-toggle="modal"
                            data-bs-target="#authModal" @endif
                            class="list-group-item list-group-item-action list-group-item-primary d-flex align-items-center- justify-content-between">
                            <div>
                                <i class="bi bi-file-earmark-medical"></i> {{ basename($taskField->file) }}
                            </div>
                            <div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                    @endif
                    <a data-bs-toggle="modal" @if (Auth::check()) data-bs-target="#taskSubmissionModal" wire:click="$dispatch('taskSubmission', {id: {{ $taskField->id }}})" @else data-bs-target="#authModal" @endif class="list-group-item list-group-item-action d-flex">
                        @if ($taskField->studentAssignments->where('user_id', Auth::user()?->id)->first()?->is_completed)
                            <div class="bg-teal d-flex align-items-center justify-content-center"
                                style="height: 20px; width: 20px;">
                                <i class="bi bi-check fs-5 text-white"></i>
                            </div>
                        @else
                            <div class="border" style="height: 20px; width: 20px;"></div>
                        @endif

                        <div class="d-flex align-items-center gap-2">
                            <div class="ms-2 text-start fs-6">
                                {{ $taskField->title ?? 'Buka ' }}
                            </div>
                            <i class="bi bi-box-arrow-up-right"></i>
                        </div>
                    </a>
                    @endif
            @endforeach
    </div>
</div>