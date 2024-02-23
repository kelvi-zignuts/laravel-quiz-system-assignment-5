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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                <div class="mt-3">
                            <a href="/test-module" ><i class="fas fa-arrow-circle-left" style="margin-left:10px; font-size:20px;"></i></a>
                        </div>
                    <div class="card-header">
                    
                        <h4 class="card-title mb-0 text-center">Test Details</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $test->name }}</p>
                        <p><strong>Description:</strong> {{ $test->description }}</p>
                        <p><strong>Level:</strong> {{ $test->level }}</p>
                        <div class="mt-3  text-center">
                            <a href="{{route('test-module.questions.index',['id'=>$test->id])}}" class="btn btn-primary">View Questions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>