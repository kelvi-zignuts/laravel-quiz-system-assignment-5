<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Exam</title>

    <style>
        .button-container {
    display: flex;
    justify-content: space-between;
}
    </style>
</head>

<body>

    <x-app-layout>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Start Exam</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="card-body">
                                    <div class="form-group">
                                        <form  id="quiz-form" action="{{ route('user.quiz.submit') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="test_id" value="{{ $test->id }}">
                                            <div class="question-container">
                                                @foreach($questions as $key => $question)
                                                <div class="question" style="display: {{ $key === 0 ? 'block' : 'none' }}">
                                                    <p>{{ $question->question }}</p>
                                                    <input type="radio" name="answer[{{ $question->id }}]" value="a">
                                                    {{ $question->option_a }}<br>
                                                    <input type="radio" name="answer[{{ $question->id }}]" value="b">
                                                    {{ $question->option_b }}<br>
                                                    <input type="radio" name="answer[{{ $question->id }}]" value="c">
                                                    {{ $question->option_c }}<br>
                                                    <input type="radio" name="answer[{{ $question->id }}]" value="d">
                                                    {{ $question->option_d }}<br>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div id="timer">Time Left: 2:00</div>
                                            <div class="button-container d-flex justify-content-between">
                                                <button type="button" class="btn btn-primary btn-prev"
                                                    style="display: none;">Previous</button>
                                                <button type="button" class="btn btn-primary btn-next">Next</button>
                                                <button type="submit" class="btn btn-success btn-submit"
                                                    style="display: none;">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
 {{-- <script src="{{ asset('users/components/script.js') }}"></script> --}}
 {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const questions = document.querySelectorAll('.question');
        const btnPrev = document.querySelector('.btn-prev');
        const btnNext = document.querySelector('.btn-next');
        const btnSubmit = document.querySelector('.btn-submit');
        let currentQuestionIndex = 0;

        // Show the first question
        questions[currentQuestionIndex].style.display = 'block';

        // Function to show/hide navigation buttons based on current question index
        function toggleButtons() {
            if (currentQuestionIndex === 0) {
                btnPrev.style.display = 'none';
            } else {
                btnPrev.style.display = 'block';
            }

            if (currentQuestionIndex === questions.length - 1) {
                btnNext.style.display = 'none';
                btnSubmit.style.display = 'block';
            } else {
                btnNext.style.display = 'block';
                btnSubmit.style.display = 'none';
            }
        }

        // Event listener for next button
        btnNext.addEventListener('click', function () {
            questions[currentQuestionIndex].style.display = 'none';
            currentQuestionIndex++;
            questions[currentQuestionIndex].style.display = 'block';
            toggleButtons();
        });

        // Event listener for previous button
        btnPrev.addEventListener('click', function () {
            questions[currentQuestionIndex].style.display = 'none';
            currentQuestionIndex--;
            questions[currentQuestionIndex].style.display = 'block';
            toggleButtons();
        });

        // Timer functionality
        const timerDisplay = document.getElementById('timer');
        let timeLeft = 120; // 10 minutes in seconds

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            if (seconds < 10) {
                seconds = "0" + seconds; // Add leading zero if seconds < 10
            }
            timerDisplay.textContent = `Time Left: ${minutes}:${seconds}`;
            if (timeLeft === 0) {
                // Automatically submit the quiz when time is up
                document.getElementById('quiz-form').submit();
            } else {
                timeLeft--;
                setTimeout(updateTimer, 1000); // Update timer every second
            }
        }

        updateTimer(); // Start the timer
    });
    document.getElementById('quiz-form').addEventListener('submit', function (event) {
            // Check if all questions have been answered
            const questions = document.querySelectorAll('.question');
            const answers = document.querySelectorAll('input[type="radio"]:checked');
            if (answers.length < questions.length) {
                // If not all questions are answered, prompt the user to complete them
                alert('Please answer all questions before submitting.');
                event.preventDefault(); // Prevent form submission
            }
        });
</script>

</body>

</html>
