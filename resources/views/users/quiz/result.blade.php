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
        <!-- <div class="container"> -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="mt-3">
                        <a href="{{route('user.quiz.index')}}"><i class="fas fa-arrow-circle-left"
                                style="margin-left:10px; font-size:20px;"></i></a>
                    </div>
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Exam Result for {{$testName}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body">
                                <!-- show result when complete the quiz -->
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Total Questions</th>
                                                    <th>Correct Answers</th>
                                                    <th>Incorrect Answer</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$totalQuestions}}</td>
                                                    <td>{{$correctAnswers}}</td>
                                                    <td>{{$totalQuestions - $correctAnswers}}</td>
                                                    <td>{{$score}}%</td>
                                                </tr>
                                            </tbody>
                                        </table>
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