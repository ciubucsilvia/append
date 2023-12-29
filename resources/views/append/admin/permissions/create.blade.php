<!-- form start -->
<form method="POST" action="{{ route('admin.permissions.store') }}">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" 
                    class="form-control" 
                    id="name" 
                    name="name"
                    value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name') {{ $message }} @enderror
                    </span>
              </div>
        </div>
        <div class="col-md-6">
            @if($roles->isNotEmpty())
                <label for="role">Roles</label><br>
                @foreach($roles  as $role)
                    <div class="form-check d-inline-block mr-3 mb-3">
                        <input class="form-check-input" 
                            type="checkbox" 
                            id="role" 
                            name="roles[]" 
                            value="{{ $role }}">
                        <label class="form-check-label" for="role">
                        {{ $role }}
                        </label>
                    </div>
                @endforeach
            @endif
        </div
    </div>

    <div>
      <button type="submit" class="btn btn-primary">Create</button>
      <a class="btn btn-light float-right" href="{{ route('admin.permissions.index') }}">Cancel</a>
    </div>
  </form>

