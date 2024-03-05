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
   <div class="row">
      <div class="col-md-12 col-lg-12">
         <div class="row row-cols-1">
            <div class="d-slider1 overflow-hidden ">
               <ul  class="swiper-wrapper list-inline m-0 p-0 mb-2">
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-01" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                              <svg class="card-slie-arrow " width="24" height="24px" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p  class="mb-2">Total Test </p>
                              <h4 class="counter" style="visibility: visible;">{{$testCount}}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-02" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                              <svg class="card-slie-arrow " width="24" height="24" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              @php
                                 $averageScore = number_format($userTestResults->avg('score'),2);
                              @endphp
                              <p  class="mb-2">Avg. Percentage</p>
                              <h4 class="counter">{{$averageScore}}%</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-03" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                              <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p  class="mb-2">Total Cost</p>
                              <h4 class="counter">$375K</h4>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
               <div class="swiper-button swiper-button-next"></div>
               <div class="swiper-button swiper-button-prev"></div>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 ">
            <form method="GET" action="{{ route('dashboard') }}">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Clear Filters</a>
                    </div>
                </div>
            </form>
        </div>
         <div class="card">
            <div class="table-responsive">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>Test Name</th>
                        <th>Total Questions</th>
                        <th>Correct Answers</th>
                        <th>Score (%)</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($userTestResults as $result)
                     <tr>
                        <td>{{$result->test->name}}</td>
                        <td>{{$result->total_questions}}</td>
                        <td>{{$result->correct_answers}}</td>
                        <td>{{$result->score}}%</td>
                        <td>
                           <a href="{{route('user.quiz.answers',['test_id' => $result->test->id])}}" style="margin-right:40px;">
                              <i class="material-icons" style="font-size:20px;">visibility</i>
                           </a>
                           <!-- <a href="{{ route('user.quiz.answers', ['test_id' => $result->test->id]) }}" class="btn btn-primary">View</a> -->
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-6">
         {{ $userTestResults->links('pagination::bootstrap-5') }}
      </div>
   </div>
</x-app-layout>
</body>
</html>
