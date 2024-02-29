<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Test Selection</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{route('user.quiz.start')}}" method="GET">
                            <label class="form-label">Select test : </label>
                            <select name="test" id="test" class="form-select form-select-sm mb-3 shadow-none">
                                <option selected="">tests</option>
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
            </div>
        </div>
    </div>

</body>

</html>