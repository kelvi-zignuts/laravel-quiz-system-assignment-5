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

<x-app-layout>
<div>
   <div class="row">
      <div class="col-sm-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Test Selection</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @if($tests->isNotEmpty())
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{route('user.quiz.start')}}" method="GET">
                            <label class="form-label">Select test : </label>
                            <select name="test" id="test" class="form-select form-select-sm mb-3 shadow-none">
                                <!-- <option selected="">tests</option> -->
                                @foreach($tests as $test)
                                <option value="{{$test->id}}">{{$test->name}}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary">Start Exam</button>

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
                @else
                <div class="card-body">
                    <p>No tests available at the moment.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
      </div>
   </div>
</div>
</x-app-layout>
</body>
</html>
