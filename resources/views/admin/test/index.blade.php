<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Temlate</title>
</head>
<body> -->
    @extends('layout.layout')
<x-app-layout :assets="$assets ?? []">
<div>
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title mb-0">Test Lists</h4>
               </div>
               <div class="text-center ms-3 ms-lg-0 ms-md-0">
                    <!-- <a href="#" class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon" data-bs-toggle="tooltip" data-modal-form="form" data-icon="person_add" data-size="small" data--href="{{ route('permission.create') }}" data-app-title="Add new Test" data-placement="top" title="New Permission">
                        <i class="btn-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </i>
                        <span>New Test</span>
                    </a> -->
                    <a href="#" class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon" data-bs-toggle="tooltip" data-modal-form="form" data-icon="person_add" data-size="small" data--href="{{ route('admin.test.create') }}" data-app-title="Add new test" data-placement="top" title="New Role">
                        <i class="btn-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </i>
                        <span>New Test</span>
                    </a>
               </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Discription</th>
                                <th>Level</th>
                                <th colspan="4" style="text-align:center;">Action</th>
                                <!-- <th></th>
                                <th></th> -->
                            </tr>
                        </thead>

                    <tbody>
                        @foreach($tests as $test)
                        <tr>
                            <td>{{$test->name}}</td>
                            <td>{{$test->description}}</td>
                            <td>{{$test->level}}</td>

                            <td class="text-center">
                                <a href="{{route('admin.test.edit',['id' => $test->id])}}" style="margin-right:40px;">
                                    <i class="fas fa-pencil-alt" style="font-size:20px;"></i>
                                </a>

                                <form action="{{route('admin.test.destroy',['id'=>$test->id])}}" method='POST' style="display:inline; margin-right:40px; ">
                                                @csrf
                                                <button type="submit" class="btn" style="color:red;" onclick="return confirm('are you sure you want to delete this test?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>


                                <a href="{{route('admin.test.question.index',['id'=>$test->id])}}" style="margin-right:40px;">
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
</div>
</x-app-layout>
<!-- </body>
</html> -->
