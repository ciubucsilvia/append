{!! Form::open(['route' => 'admin.testimonials.store', 'files' => true]) !!}
    @csrf
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('name') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('occupation', 'Occupation') !!}
        {!! Form::text('occupation', old('occupation'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('occupation') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('rating', 'Note') !!}
        {!! Form::number('rating', old('rating'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('rating') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('image', 'Select Image') !!}
        {!! Form::file('image') !!}
        <span class="text-danger">
          @error('image') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('message', 'Message') !!}
        {!! Form::textarea('message', old('message'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('message') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-check">
        {!! Form::checkbox('active', true, old('active'), ['class' => 'form-check-input']) !!}
        {!! Form::label('active', 'Active') !!}
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Create</button>
      <a class="btn btn-light" href="{{ route('admin.testimonials.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}