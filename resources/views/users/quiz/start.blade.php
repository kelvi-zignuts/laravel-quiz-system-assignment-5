<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Start Exam</h1>
    <form action="{{route('user.quiz.submit')}}" method="POST">
        @csrf
        @foreach($questions as $question)
            <div>
                <p>{{$question->question}}</p>
                <input type="radio" name="answer[{{$question->id}}]" value="A"> {{$question->option_a}}<br>
                <input type="radio" name="answer[{{$question->id}}]" value="B"> {{$question->option_b}}<br>
                <input type="radio" name="answer[{{$question->id}}]" value="C"> {{$question->option_c}}<br>
                <input type="radio" name="answer[{{$question->id}}]" value="D"> {{$question->option_d}}<br>
            </div>
        @endforeach
        <input type="hidden" name="test_id" value="{{$testId}}">
        <button type="submit">Submit</button>
    </form>
</body>
</html>