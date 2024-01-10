<form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xl-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $permission->name) }}">
                <span class="mt-2 d-block text-danger">
                    @error('name') {{ $message }} @enderror
                </span>
                </div>
                <div class="form-footer mt-6">
                <button type="submit" class="btn btn-primary btn-pill">Edit</button>
                <a class="btn btn-light btn-pill" href="{{ route('admin.permissions.index') }}">Cancel</a>
            </div>
        </div>

        <div class="col-xl-6">
            @if($roles->isNotEmpty())
                <label for="role">Roles</label><br>
                @foreach($roles  as $key => $role)
                    <div class="form-check d-inline-block mr-3 mb-3">
                        <input class="form-check-input" 
                            type="checkbox" 
                            id="role" 
                            name="roles[]" 
                            value="{{ $role }}"
                            @if($permission->roles->contains($key)) checked @endif
                            >
                        <label class="form-check-label" for="role">
                        {{ $role }}
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
  </form>