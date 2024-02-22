<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title mb-0">Edit Test</h4>
                            </div>
                            <div class="card-body">
                                    <form action="/role-permission/{{$test->id}}" method='POST'>
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name">Name : </label>
                                            <input type="text" name='name' id='name' value='{{old("name",$test->name)}}' class='form-control @error("name") is invalid @enderror'>
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                        <label for="description">Description : </label>
                                            <textarea name='description' id='description' class='form-control @error("description") is invalid @enderror'>{{old("description",$test->description)}}</textarea>
                                            @error('description')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="level">level : </label>
                                            <input type="text" name='level' id='level' value='{{old("level",$test->level)}}' class='form-control @error("level") is invalid @enderror'>
                                            @error('level')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
