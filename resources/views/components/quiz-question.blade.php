@props(['number', 'question' => null, 'materi'])

@php
    if($question && Auth::user() ){
        $userAnswer = \App\Models\UserAnswer::where('user_id', Auth::user()->id)->where('quiz_question_id', $question->id)->first();
    }else{
        $userAnswer = null;
    }
@endphp

<div class="mt-4 d-flex flex-row w-100">
    <div>
        <x-number-box :height="32" :width="32">
            <span style="font-size: 15px;">{{ $number+1}}</span>
        </x-number-box>
    </div>
    <div class="esai-question flex-grow-1 ms-3">
        <div>
            {{ $question?->question }}
        </div>
        @foreach (['A', 'B', 'C', 'D'] as $option)
        <div class="mt-2 d-flex gap-3 align-items-center">
            <input type="radio" class="btn-check" name="answer_{{ $question->id }}_{{ $materi }}" id="answer_{{ $question->id }}_{{ $option }}"
                autocomplete="off" value="{{ $option }}" @if ($userAnswer?->answer == $option)
                    checked
                @endif>

            <!-- This label will turn .btn-light when selected -->
            <label class="btn btn-outline-light d-flex align-items-center justify-content-center"
                for="answer_{{ $question->id }}_{{ $option }}" style="height: 32px; width: 32px;">
                {{ $option }}
            </label>

            <!-- Just a normal text label (clickable too) -->
            <label style="cursor:pointer;" for="answer_{{ $question->id }}_{{ $option }}">
                {{ $question->getAttribute('answer_'.strtolower($option)) }}
            </label>
        </div>

        @endforeach
    </div>
</div>