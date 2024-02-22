<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Temlate</title>
</head>
<body>
<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="mt-3">
                            <a href="javascript:history.back()" ><i class="fas fa-arrow-circle-left" style="margin-left:10px; font-size:20px;"></i></a>
                        </div>
                    <div class="card-header">Questions</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('questions.create',['id'=>$test_id]) }}" class="btn btn-primary">Create Questions</a>
                        </div>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Correct Option</th>
                                    <th colspan="4" style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>{{ $question->correct_option }}</td>

                                        <td class="text-center">
                                <a href="#" style="margin-right:40px;">
                                    <i class="fas fa-pencil-alt" style="font-size:20px;"></i>
                                </a>
                                <form action="#" method='POST' style="display:inline; margin-right:40px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this test?')">delete</button>
                                </form>
                                <a href="#" style="margin-right:40px;">
                                    <i class="material-icons" style="font-size:20px;">visibility</i>
                                </a>
                            </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>