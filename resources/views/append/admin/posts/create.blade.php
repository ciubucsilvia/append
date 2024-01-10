{!! Form::open(['route' => 'admin.posts.store', 'files' => true]) !!}
    @csrf
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('title') {{ $message }} @enderror
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
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('content') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('post_category_id', 'Category') !!}
        {!! Form::select('post_category_id', $categories, old('post_category_id'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('post_category_id') {{ $message }} @enderror
        </span>
      </div>
      
      <div class="form-group">
        {!! Form::label('tags', 'Tags') !!}
        {!! Form::select('tags[]', $tags, old('tags'), ['multiple' => true, 'class' => 'form-control']) !!}
        <span class="text-danger">
            @error('tags') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-check">
        {!! Form::checkbox('is_published', true, old('is_published'), ['class' => 'form-check-input']) !!}
        {!! Form::label('is_published', 'Published') !!}
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Create</button>
      <a class="btn btn-light" href="{{ route('admin.posts.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}