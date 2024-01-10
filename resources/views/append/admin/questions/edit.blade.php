{!! Form::open(['route' => ['admin.questions.update', $question->id]]) !!}
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('question', 'Question') !!}
        {!! Form::textarea('question', old('question', $question->question), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('question') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('answer', 'Answer') !!}
        {!! Form::textarea('answer', old('answer', $question->answer), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('answer') {{ $message }} @enderror
        </span>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit</button>
      <a class="btn btn-light" href="{{ route('admin.questions.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}