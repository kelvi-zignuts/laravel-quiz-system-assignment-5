<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>answers</title>

</head>

<body>

    <x-app-layout>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">answers</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="card-body">
                                    <div class="form-group">
                                        <table class="table">

                                           @foreach($questions as $key => $question)
                                                <p>{{ $key + 1 }} . {{ $question->question }}</p>
                                                <div style="display:inline-block;vertical-align:top;">
                                                    <span class="option_label">(A)</span> {{ $question->option_a }}<br>
                                                    <span class="option_label">(B)</span> {{ $question->option_b }}<br>
                                                    <span class="option_label">(C)</span> {{ $question->option_c }}<br>
                                                    <span class="option_label">(D)</span> {{ $question->option_d }}<br>
                                                </div>
                                                <p >Correct Option: {{ $question->correct_option }}</p>
                                                @php
                                                $userResponse = $userResponses->where('question_id', $question->id)->first();
                                            @endphp

                                            @if($userResponse)
                                                <p>User Selected Option: {{ $userResponse->selected_option }}</p>
                                                <p>Is Correct: {{ $userResponse->is_correct ? 'Yes' : 'No' }}</p>
                                            @else
                                                <p>User did not answer this question.</p>
                                            @endif
                                                <hr style="border-top: 1px solid #000; margin-top: 10px; margin-bottom: 10px;"> 
                                            @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>


</body>

</html>