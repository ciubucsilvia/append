{!! Form::open(['route' => ['admin.projects.update', $project->id], 'files' => true]) !!}
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', 
          old('title', $project->title), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('title') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description', 
          old('description', $project->description), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('description') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('image', 'Select Images') !!}
        {!! Form::file('image[]', 
          ['multiple' => true]) !!}
        <span class="text-danger">
          @error('image') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('project_category_id', 'Category') !!}
        {!! Form::select('project_category_id', 
          $categories, 
          old('project_category_id', $project->project_category_id), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('project_category_id') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('client_id', 'Client') !!}
        {!! Form::select('client_id', 
          $clients, 
          old('client_id', $project->client_id), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('client_id') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', 
          old('content', $project->content), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('content') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('url', 'Url') !!}
        {!! Form::text('url', 
          old('url', $project->url), 
          ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('url') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-check">
        {!! Form::checkbox('is_published', 
          true, 
          old('is_published', $project->is_published), 
          ['class' => 'form-check-input']) !!}
        {!! Form::label('is_published', 'Published') !!}
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit</button>
      <a class="btn btn-light" href="{{ route('admin.projects.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}