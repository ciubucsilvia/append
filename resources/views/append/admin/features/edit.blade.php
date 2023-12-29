{!! Form::open(['route' => ['admin.features.update', $feature->id], 'files' => true]) !!}
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', 
          old('title', $feature->title), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('title') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('image', 'Select Image') !!}
        {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
        <span class="text-danger">
          @error('image') {{ $message }} @enderror
        </span>
        <img class="img img-fluid" src="{{ asset('storage/'. env('THEME') . '/images/features/' . $feature->image) }}" alt="">
      </div>

      <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', old('content', $feature->content), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('content') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-check">
        {!! Form::checkbox('active', true, old('active', $feature->active), ['class' => 'form-check-input']) !!}
        {!! Form::label('active', 'Active') !!}
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit</button>
      <a class="btn btn-light" href="{{ route('admin.features.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}