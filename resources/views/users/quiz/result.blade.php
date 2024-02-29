<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Temlate</title>
    <style>
        table{
            width :100%;
            border-collapse: collapse;
        }
        th,td{
            border:1px solid black;
            padding:8px;
            text-align:left;
        }
        th{
            background-color: #f2f2f2;
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
                <h4 class="card-title">Exam Result for {{$testName}}</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <div class="form-group">
                    <table>
                        <tr>
                            <th>Total Questions</th>
                            <td>{{$totalQuestions}}</td>
                        </tr>
                        <tr>
                            <th>Correct Answers</th>
                            <td>{{$correctAnswers}}</td>
                        </tr>
                        <tr>
                            <th>Incorrect Answer</th>
                            <td>{{$totalQuestions - $correctAnswers}}</td>
                        </tr>
                        <tr>
                            <th>Score</th>
                            <td>{{$score}}%</td>
                        </tr>
                    </table>
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
</body>
</html>