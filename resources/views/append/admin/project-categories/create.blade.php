{!! Form::open(['route' => 'admin.project-categories.store']) !!}
    @csrf
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('name') {{ $message }} @enderror
        </span>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Create</button>
      <a class="btn btn-light" href="{{ route('admin.project-categories.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}