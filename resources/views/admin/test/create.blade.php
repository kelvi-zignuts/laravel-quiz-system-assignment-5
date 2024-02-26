{{ Form::open(['url' => route('admin.test.store'), 'method' => 'post']) }}
    <div class="from-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name"> </input>
            </div><br>

            <div class="from-group">
                <label for="description">Description:</label>
                <textarea type="text" class="form-control" name="description"></textarea>
            </div><br>

            <div class="from-group">
                <label for="level">Level:</label>
                <select name="level" class="form-control">
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <br>
    </div>
<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
{{ Form::close() }}

