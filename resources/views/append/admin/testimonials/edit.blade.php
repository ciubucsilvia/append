{!! Form::open(['route' => ['admin.testimonials.update', $testimonial->id], 'files' => true]) !!}
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', old('name', $testimonial->name), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('name') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('occupation', 'Occupation') !!}
        {!! Form::text('occupation', old('occupation', $testimonial->occupation), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('occupation') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('rating', 'Note') !!}
        {!! Form::number('rating', old('rating', $testimonial->rating), ['class' => 'form-control']) !!}
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
        {!! Form::textarea('message', old('message', $testimonial->message), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('message') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-check">
        {!! Form::checkbox('active', true, old('active', $testimonial->active), ['class' => 'form-check-input']) !!}
        {!! Form::label('active', 'Active') !!}
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit</button>
      <a class="btn btn-light" href="{{ route('admin.testimonials.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}