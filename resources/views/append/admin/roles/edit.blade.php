<form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
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
                    value="{{ old('name', $role->name) }}">
                <span class="mt-2 d-block text-danger">
                    @error('name') {{ $message }} @enderror
                </span>
                </div>
                <div class="form-footer mt-6">
                <button type="submit" class="btn btn-primary btn-pill">Edit</button>
                <a class="btn btn-light btn-pill" href="{{ route('admin.roles.index') }}">Cancel</a>
            </div>
        </div>

        <div class="col-xl-6">
            @if($permissions->isNotEmpty())
                <label for="permission">Permissions</label><br>
                @foreach($permissions  as $key => $permission)
                    <div class="form-check d-inline-block mr-3 mb-3">
                        <input class="form-check-input" 
                            type="checkbox" 
                            id="permission" 
                            name="permissions[]" 
                            value="{{ $permission }}"
                            @if($role->permissions->contains($key)) checked @endif
                            >
                        <label class="form-check-label" for="permission">
                        {{ $permission }}
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
  </form>