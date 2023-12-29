{!! Form::open(['route' => ['admin.clients.update', $client->id], 'files' => true]) !!}
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', old('name', $client->name), ['class' => 'form-control']) !!}
        <span class="text-danger">
            @error('name') {{ $message }} @enderror
        </span>
      </div>

      <div class="form-group">
        {!! Form::label('name', 'Select Image') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
        <span class="text-danger">
          @error('image') {{ $message }} @enderror
        </span>
        <img src="{{ asset('storage/'. env('THEME') . '/images/clients/' . $client->image) }}" alt="">
      </div>

      <div class="form-check">
        {!! Form::checkbox('active', true, old('active', $client->active), ['class' => 'form-check-input']) !!}
        {!! Form::label('active', 'Active') !!}
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit</button>
      <a class="btn btn-light" href="{{ route('admin.clients.index') }}">Cancel</a>
    </div>
  {!! Form::close() !!}