<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
    <x-app-layout>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="mt-3">
                            <a href="{{route('admin.test.question.index',['id'=>$test_id])}}"><i
                                    class="fas fa-arrow-circle-left" style="margin-left:10px; font-size:20px;"></i></a>
                        </div>
                        <div class="card-header text-center">Edit Question</div>
                        <div class="card-body">
                            <!-- edit questions with options -->
                            <form action="{{ route('admin.test.question.update', ['id' => $question->id]) }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" name="question" id="question"
                                        value="{{ $question->question }}">
                                </div>
                                <div class="form-group">
                                    <label for="option_a">Option A</label>
                                    <input type="text" class="form-control" name="option_a" id="option_a"
                                        value="{{ $question->option_a }}">
                                </div>
                                <div class="form-group">
                                    <label for="option_b">Option B</label>
                                    <input type="text" class="form-control" name="option_b" id="option_b"
                                        value="{{ $question->option_b }}">
                                </div>
                                <div class="form-group">
                                    <label for="option_c">Option C</label>
                                    <input type="text" class="form-control" name="option_c" id="option_c"
                                        value="{{ $question->option_c }}">
                                </div>
                                <div class="form-group">
                                    <label for="option_d">Option D</label>
                                    <input type="text" class="form-control" name="option_d" id="option_d"
                                        value="{{ $question->option_d }}">
                                </div>
                                <!-- edit correct option -->
                                <div class="form-group">
                                    <label for="correct_option">Correct Option</label>
                                    <select class="form-control" name="correct_option" id="correct_option">
                                        <option value="a" {{ $question->correct_option == 'a' ? 'selected' : '' }}>
                                            Option A</option>
                                        <option value="b" {{ $question->correct_option == 'b' ? 'selected' : '' }}>
                                            Option B</option>
                                        <option value="c" {{ $question->correct_option == 'c' ? 'selected' : '' }}>
                                            Option C</option>
                                        <option value="d" {{ $question->correct_option == 'd' ? 'selected' : '' }}>
                                            Option D</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Question</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>