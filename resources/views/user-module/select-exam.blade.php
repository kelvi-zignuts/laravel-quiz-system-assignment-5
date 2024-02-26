<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Quiz system</title>
</head>
<body>
    <!-- <h1>Start Exam : {{$test->name}}</h1> -->
    <form action="{{route('user.tests.startExam',['test'=>$test->id])}}" method="POST">
        @csrf
        <input type="hidden" name="test_id" value="{{$test->id}}">
        @foreach($questions as $question)
            <div>
                <p>{{$question -> question}}</p>
                @foreach($question->options as $option)
                    <label>
                        <input type="radio" nam="answer[{{$question->id}}]" value="{{$option->id}}">
                        {{$option->option}}
                    </label>
                    @endforeach
            </div>
            @endforeach
            <button type="submit">Submit Exam</button>
    </form>
</body>
</html>