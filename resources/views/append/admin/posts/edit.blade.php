{!! Form::open(['route' => ['admin.posts.update', $post->id], 'files' => true]) !!}
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', old('title', $post->title), ['class' => 'form-control']) !!}
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
        {!! Form::textarea('content', old('content', $post->content), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('content') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('post_category_id', 'Category') !!}
        {!! Form::select('post_category_id', $categories, old('post_category_id', $post->post_category_id), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('post_category_id') {{ $message }} @enderror
        </span>
      </div>
      
      <div class="form-group">
        {!! Form::label('tags', 'Tags') !!}
        {!! Form::select('tags[]', $tags, old('tags', $post->tags), ['multiple' => true, 'class' => 'form-control']) !!}
        <span class="text-danger">
            @error('tags') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-check">
        {!! Form::checkbox('is_published', true, old('is_published', $post->is_published), ['class' => 'form-check-input']) !!}
        {!! Form::label('is_published', 'Published') !!}
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit</button>
      <a class="btn btn-light" href="{{ route('admin.posts.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}