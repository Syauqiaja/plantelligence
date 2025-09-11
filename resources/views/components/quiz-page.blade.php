@props(['materi', 'pageTitle', 'color' => 'teal'])

@php
$quiz = \App\Models\Quiz::where('order', $materi)->first();
$quizId = $quiz->id;
$totalQuestions = $quiz->questions->count();
$questionIds = $quiz->questions->pluck('id');
$questionsPerPage = 3;
$options = ['A', 'B', 'C', 'D'];
$quizResult = Auth::user() ? \App\Models\QuizResult::where('user_id', Auth::user()->id)->where('quiz_id',
$quizId)->first() : null;
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
                data-title="{{ $pageTitle }}" data-materi="{{ $materi }}" data-ids="{{ $questionIds->toJson() }}" data-quizId={{ $quizId }}>
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
    console.log(JSON.parse(event.target.getAttribute('data-ids')));
    
    // Get all radio button answers from the flipbook (including hidden pages)
    const answers = {};
    const totalQuestions = {{ $totalQuestions }};
    const questionIds =JSON.parse(event.target.getAttribute('data-ids'));
    let answeredQuestions = 0;
    const materi = event.target.getAttribute('data-materi');
    const quizId = event.target.getAttribute('data-quizId');
    
    // Get the flipbook instance and its page objects
    const flipbook = $('#flipbook');
    const flipbookData = flipbook.data();
    
    // Function to search for inputs in a jQuery element
    function findInputsInElement($element) {
        // Search within the element and its children
        return $element.find('input').add($element.filter('input'));
    }
    
    // Collect all answers from radio inputs across all pages
    questionIds.forEach(questionId => {
        let found = false;
        
        // First, try to find in the visible DOM
        const visibleRadio = document.querySelector(`input[name="answer_${questionId}_${materi}"]:checked`);
        if (visibleRadio) {
            answers[`${questionId}`] = visibleRadio.value;
            answeredQuestions++;
            found = true;
        } else {
            // If not found in visible DOM, search through all pageObjs
            if (flipbookData && flipbookData.pageObjs) {
                Object.values(flipbookData.pageObjs).forEach(pageObj => {
                    if (!found && pageObj && pageObj.length) {
                        // Search for checked radio buttons in this page
                        const $checkedRadio = findInputsInElement(pageObj).filter(`[name="answer_${questionId}_${materi}"]:checked`);
                        if ($checkedRadio.length > 0) {
                            answers[`${questionId}`] = $checkedRadio.val();
                            answeredQuestions++;
                            found = true;
                        }
                    }
                });
            }
        }
        
        // If still not found, check if there's an unchecked input (to know the question exists)
        if (!found) {
            // Check in visible DOM first
            const visibleInput = document.querySelector(`input[name="answer_${questionId}_${materi}"]`);
            let inputExists = !!visibleInput;
            
            // If not in visible DOM, check pageObjs
            if (!inputExists && flipbookData && flipbookData.pageObjs) {
                Object.values(flipbookData.pageObjs).forEach(pageObj => {
                    if (!inputExists && pageObj && pageObj.length) {
                        const $input = findInputsInElement(pageObj).filter(`[name="answer_${questionId}_${materi}"]`);
                        if ($input.length > 0) {
                            inputExists = true;
                        }
                    }
                });
            }
        }
    });
    
    console.log('Collected answers:', answers);
    console.log(`Answered ${answeredQuestions} out of ${totalQuestions} questions of materi ${materi}`);
    
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

    if (quizId) {
        formData.append('quiz_id', quizId);
    }
    
    // Submit with AJAX
    submitWithAjax(formData);
}

// Alternative approach: Force all pages to be rendered before collecting data
function submitFormAlternative(event) {
    console.log(JSON.parse(event.target.getAttribute('data-ids')));
    
    const answers = {};
    const totalQuestions = {{ $totalQuestions }};
    const questionIds = JSON.parse(event.target.getAttribute('data-ids'));
    let answeredQuestions = 0;
    const materi = event.target.getAttribute('data-materi');
    const flipbook = $('#flipbook');
    const quizId = event.target.getAttribute('data-quizId');
    
    // Store current page
    const currentPage = flipbook.turn('page');
    
    // Function to collect answers from current visible pages
    function collectAnswers() {
        questionIds.forEach(questionId => {
            if (!answers[`${questionId}`]) { // Only collect if not already found
                const checkedRadio = document.querySelector(`input[name="answer_${questionId}_${materi}"]:checked`);
                if (checkedRadio) {
                    answers[`${questionId}`] = checkedRadio.value;
                }
            }
        });
    }
    
    // Collect answers from all pages by visiting each page
    let pagesVisited = 0;
    const totalPages = flipbook.turn('pages');
    
    function visitNextPage() {
        pagesVisited++;
        collectAnswers();
        
        if (pagesVisited <= totalPages) {
            if (pagesVisited < totalPages) {
                // Go to next page and collect after a short delay
                flipbook.turn('page', pagesVisited + 1);
                setTimeout(visitNextPage, 100); // Small delay to ensure page is rendered
            } else {
                // Finished visiting all pages, go back to original page
                flipbook.turn('page', currentPage);
                finishSubmission();
            }
        }
    }
    
    function finishSubmission() {
        // Count answered questions
        answeredQuestions = Object.keys(answers).length;
        
        console.log('Collected answers:', answers);
        console.log(`Answered ${answeredQuestions} out of ${totalQuestions} questions`);
        
        // Validate that all questions are answered
        if (answeredQuestions < totalQuestions) {
            alert(`Please answer all questions. You have answered ${answeredQuestions} out of ${totalQuestions} questions of materi ${materi}.`);
            return;
        }
        
        // Create FormData and submit
        const formData = new FormData();
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (csrfToken) {
            formData.append('_token', csrfToken);
        }
        
        formData.append('answers', JSON.stringify(answers));
        
        const pageTitle = event.target.getAttribute('data-title');
        if (pageTitle) {
            formData.append('page_title', pageTitle);
        }

        if (quizId) {
            formData.append('quiz_id', quizId);
        }
        
        submitWithAjax(formData);
    }
    
    // Start the process
    visitNextPage();
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