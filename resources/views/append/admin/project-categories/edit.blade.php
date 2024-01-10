{!! Form::open(['route' => ['admin.project-categories.update', $projectCategory->id]]) !!}
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', old('name', $projectCategory->name), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('name') {{ $message }} @enderror
        </span>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit</button>
      <a class="btn btn-light" href="{{ route('admin.project-categories.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}