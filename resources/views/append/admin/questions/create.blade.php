{!! Form::open(['route' => 'admin.questions.store']) !!}
    @csrf
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('question', 'Question') !!}
        {!! Form::textarea('question', old('question'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('question') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('answer', 'Answer') !!}
        {!! Form::textarea('answer', old('answer'), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('answer') {{ $message }} @enderror
        </span>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Create</button>
      <a class="btn btn-light" href="{{ route('admin.questions.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}