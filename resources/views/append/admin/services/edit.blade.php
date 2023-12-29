{!! Form::open(['route' => ['admin.services.update', $service->id], 'files' => true]) !!}
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', 
          old('title', $service->title), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('title') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', 
          old('description', $service->description), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('description') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('icon', 'Icon') !!}
        {!! Form::text('icon', 
          old('icon', $service->icon), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('icon') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('image', 'Select Image') !!}
        {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
        <span class="text-danger">
          @error('image') {{ $message }} @enderror
        </span>
        <img class="img img-fluid" src="{{ asset('storage/'. env('THEME') . '/images/services/' . $service->image) }}" alt="">
      </div>

      <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', old('content', $service->content), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('content') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-check">
        {!! Form::checkbox('active', true, old('active', $service->active), ['class' => 'form-check-input']) !!}
        {!! Form::label('active', 'Active') !!}
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit</button>
      <a class="btn btn-light" href="{{ route('admin.services.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}