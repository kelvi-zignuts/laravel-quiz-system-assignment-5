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
          <input type="hidden" name="test_id" value="{{$test->id}}">
        @foreach($questions as $question)
            <div>
                <p>{{$question->question}}</p>
                <input type="radio" name="answer[{{$question->id}}]" value="a"> {{$question->option_a}}<br>
                <input type="radio" name="answer[{{$question->id}}]" value="b"> {{$question->option_b}}<br>
                <input type="radio" name="answer[{{$question->id}}]" value="c"> {{$question->option_c}}<br>
                <input type="radio" name="answer[{{$question->id}}]" value="d"> {{$question->option_d}}<br>
            </div>
        @endforeach
      
        <button type="submit">Submit</button>
    </form>
</body>
</html>