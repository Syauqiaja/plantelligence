@props(['materi', 'pageTitle', 'color' => 'teal'])

@php
$quiz = \App\Models\Quiz::where('order', $materi)->first();
$quizId = $quiz->id;
$totalQuestions = $quiz->questions->count();
$questionIds = $quiz->questions->pluck('id');
$questionsPerPage = 3;
$options = ['A', 'B', 'C', 'D'];
$quizResult = Auth::user() ? \App\Models\QuizResult::where('user_id', Auth::user()->id)->where('quiz_id', $quizId)->first() : null;
@endphp

@for ($page = 0; $page < ceil($totalQuestions / $questionsPerPage); $page++) @php $startQuestion=$page *
    $questionsPerPage; $endQuestion=min(($page + 1) * $questionsPerPage, $totalQuestions);
    $questionsInThisPage=range($startQuestion, $endQuestion - 1); $isFirstPage=$page===0; @endphp <div
    class="bg-soft-{{ $color }} text-dark">
    <div class="position-relative w-100 h-100">
        <div class="p-3" style="font-size: 14px;">
            @if($isFirstPage)
            <h3 class="h4 mt-2 text-center">Quiz</h3>
            @endif

            @foreach ($questionsInThisPage as $questionNumber)
            <x-quiz-question :number="$questionNumber" :options="$options" :question="$quiz->questions[$questionNumber]"
                :materi="$materi" />
            @endforeach
        </div>

        <div class="position-absolute" style="bottom:12px; right: 16px;">
            <small>{{ $pageTitle }}</small>
        </div>

        @if ($page == ceil($totalQuestions / $questionsPerPage) - 1)
        <div class="mt-5 mx-4 d-flex align-items-center justify-content-end">
            @auth
            <button type="button" class="btn btn-dark px-5 py-2" onclick="submitForm(event)"
                data-title="{{ $pageTitle }}" data-materi="{{ $materi }}">
                @else
                <button data-bs-toggle="modal" data-bs-target="#authModal" class="btn btn-dark  px-5 py-2"
                    style="text-decoration: none;">
                    @endauth
                    Submit
                </button>
        </div>

        @if ($quizResult)
        <div class="p-3 border border-{{ $color }} rounded mx-5 mt-3">
            <h5>Skor Quiz</h5>
            {{ $quizResult->score }}
            <br />
            <div class="bg-{{ $color }} text-white my-2 px-3">
                Feedback
            </div>
            <p style="font-size: 13px;">{{scoreToFeedback($quizResult->score)}}</p>
        </div>
        @endif
        @endif
    </div>
    </div>
    @endfor

    @pushOnce('scripts')
    <script>
        function submitForm(event) {
    console.log(event);
    
    // Get all radio button answers from the flipbook
    const answers = {};
    const totalQuestions = {{ $totalQuestions }};
    const questionIds = @json($questionIds);
    let answeredQuestions = 0;
    const materi = event.target.getAttribute('data-materi');
    
    // Collect all answers from radio inputs
    questionIds.forEach(i => {
        const checkedRadio = document.querySelector(`input[name="answer_${i}_${materi}"]:checked`);
        if (checkedRadio) {
            answers[`${i}`] = checkedRadio.value;
            answeredQuestions++;
        }
    });
    
    // Validate that all questions are answered
    if (answeredQuestions < totalQuestions) {
        alert(`Please answer all questions. You have answered ${answeredQuestions} out of ${totalQuestions} questions of materi ${materi}.`);
        return;
    }
    
    // Create FormData object
    const formData = new FormData();
    
    // Add CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    if (csrfToken) {
        formData.append('_token', csrfToken);
    }
    
    formData.append('answers', JSON.stringify(answers));
    
    // Add page title
    const pageTitle = event.target.getAttribute('data-title');
    if (pageTitle) {
        formData.append('page_title', pageTitle);
    }

    const quizId = {{ $quizId }};
    if (quizId) {
        formData.append('quiz_id', quizId);
    }
    
    // Submit with AJAX
    submitWithAjax(formData);
}

// AJAX submission function
function submitWithAjax(formData) {
    // Show loading state
    const submitButton = document.querySelector('button[onclick*="submitForm"]');
    if (submitButton) {
        submitButton.disabled = true;
        submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Submitting...';
    }
    
    fetch('/quiz/submit', {  // Update this URL to match your route
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Success:', data);
        alert('Quiz submitted successfully!');
        
        // Optional: redirect or show results
        if (data.redirect_url) {
            window.location.href = data.redirect_url;
        } else if (data.inner_html) {
            // Pick a target element in your page
            const container = document.getElementById('quiz-result') 
                        || document.body; // fallback if no container
            container.innerHTML = data.inner_html;
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('Error submitting quiz. Please try again.');
    })
    .finally(() => {
        // Re-enable submit button
        if (submitButton) {
            submitButton.disabled = false;
            submitButton.innerText = 'Submit';
        }
    });
}
    </script>
    @endPushOnce