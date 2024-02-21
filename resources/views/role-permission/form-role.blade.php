<!-- {{ Form::open(['url' => '#','method' => 'post']) }}
    <div class="form-group">
        <label class="form-label">role title</label>
        {{ Form::text('title', old('title'), ['class' => 'form-control','id' => 'role-title', 'placeholder' => 'Role Title', 'required']) }}
    </div>
    <label class="form-label">Status</label>
    <div class="form-check">
        {{ Form::radio('status', '1',old('status'), ['class' => 'form-check-input', 'id' => 'roleassigned']); }}
        <label class="form-check-label" for="roleassigned">yes</label>
    </div>
    <div class="mb-3 form-check">
        {{ Form::radio('status', '0',old('status'), ['class' => 'form-check-input', 'id' => 'rolenotassigned']); }}
        <label class="form-check-label" for="rolenotassigned">no</label>
    </div>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
{{ Form::close() }} -->

{{ Form::open(['url' => url('tests'), 'method' => 'post']) }}
    <div class="from-group">
                <label for="name">Name:</label>
                <textarea type="text" class="form-control" name="name"></textarea>
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

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
    <title>Admin - Dashboard</title>
</head>
<body>
    <div class="container">
        <form action="{{route('store')}}" method="post">
            <div class="from-group">
                <label for="name">Name:</label>
                <textarea type="text" class="form-control" name="name"></textarea>
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

            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
           
        </form>
    </div>
   </body>
</html> -->
