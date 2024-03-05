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
                            <form action="{{route('admin.test.update',['id' => $test->id])}}" method='POST'>
                                @csrf
                                <!-- edit test name -->
                                <div class="form-group">
                                    <label for="name">Name : </label>
                                    <input type="text" name='name' id='name' value='{{old("name",$test->name)}}'
                                        class='form-control @error("name") is invalid @enderror'>
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- edit test description -->
                                <div class="form-group">
                                    <label for="description">Description : </label>
                                    <textarea name='description' id='description'
                                        class='form-control @error("description") is invalid @enderror'>{{old("description",$test->description)}}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <!-- edit test level -->
                                <div class="form-group">
                                    <label for="level">Level:</label>
                                    <select name="level" class="form-control">
                                        <option value="High"
                                            {{ old('level', $test->level) === 'High' ? 'selected' : '' }}>
                                            High</option>
                                        <option value="Medium"
                                            {{ old('level', $test->level) === 'Medium' ? 'selected' : '' }}>
                                            Medium</option>
                                        <option value="Low"
                                            {{ old('level', $test->level) === 'Low' ? 'selected' : '' }}>
                                            Low</option>
                                    </select>
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