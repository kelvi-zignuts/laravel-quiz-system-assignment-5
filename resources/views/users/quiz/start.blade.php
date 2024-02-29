<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Temlate</title>
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
                                        <form action="{{route('user.quiz.submit')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="test_id" value="{{$test->id}}">
                                            @php $questionNumber = 1; @endphp
                                            @foreach($questions as $question)
                                            <div>
                                                <p>{{$questionNumber}}. {{$question->question}}</p>
                                                <input type="radio" name="answer[{{$question->id}}]" value="a">
                                                {{$question->option_a}}<br>
                                                <input type="radio" name="answer[{{$question->id}}]" value="b">
                                                {{$question->option_b}}<br>
                                                <input type="radio" name="answer[{{$question->id}}]" value="c">
                                                {{$question->option_c}}<br>
                                                <input type="radio" name="answer[{{$question->id}}]" value="d">
                                                {{$question->option_d}}<br>
                                            </div>
                                            @endforeach
                                            @php $questionNumber++; @endphp
                                            <button type="submit">Submit</button>
                                            <!-- <div id="navigationButtons">
                                                <button type="button" onclick="previousQuestion()">Previous</button>
                                                <button type="button" onclick="nextQuestion()">Next</button>
                                                <button type="submit" id="submitBtn"
                                                    style="display:none;">Submit</button>
                                            </div> -->

                                        </form>
                                        <!-- <form method="POST" action="{{route('logout')}}">
                                            @csrf
                                            <a href="javascript:void(0)" class="dropdown-item" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                {{ __('Log out') }}
                                            </a>
                                        </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    <!-- <script>
        let currentQuestion = 1;
        const totalQuestions = document.querySelectorAll('.question').length;

        function showQuestion(questionNumber){
            document.querySelectorAll('.question').forEach((question) => {
                question.style.display = 'none';
            });
            document.getElementById('question' + questionNumber).style.display='block';
            currentQuestion = questionNumber;
            if(currentQuestion === 1){
                document.getElementById('navigationButtons').style.display = 'block';
                document.getElementById('submitBtn').style.display = 'none';

            }else if (currentQuestion === totalQuestions){
                document.getElementById('navigationButtons').style.display = 'block';
                document.getElementById('submitBtn').style.display = 'block';
            }else{
                document.getElementById('navigationButtons').style.display = 'block';
                document.getElementById('submitBtn').style.display = 'none';
            }
        }
        function nextQuestion(){
            if(currentQuestion<totalQuestions){
                showQuestion(currentQuestion + 1);
            }
        }
        function previousQuestion(){
            if(currentQuestion > 1){
                showQuestion(currentQuestion - 1);
            }
        }
        showQuestion(1);
    </script> -->
</body>

</html>