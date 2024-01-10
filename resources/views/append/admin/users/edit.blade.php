<form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
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
                    value="{{ old('name', $user->name) }}">
                <span class="mt-2 d-block text-danger">
                    @error('name') {{ $message }} @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" 
                    class="form-control" 
                    id="image"
                    name="image"
                    value="{{ old('image', $user->image) }}">
                <span class="mt-2 d-block text-danger">
                    @error('image') {{ $message }} @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="occupation">Occupation</label>
                <input type="text" 
                    class="form-control" 
                    id="occupation" 
                    name="occupation" 
                    value="{{ old('occupation', $user->occupation) }}">
                <span class="mt-2 d-block text-danger">
                    @error('occupation') {{ $message }} @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" 
                    id="description" 
                    cols="30" 
                    rows="10"
                    name="description" >{{ old('description', $user->description) }}</textarea>
                <span class="mt-2 d-block text-danger">
                    @error('description') {{ $message }} @enderror
                </span>
            </div>
            
            <div class="form-footer mt-6">
                <button type="submit" class="btn btn-primary btn-pill">Edit</button>
                <a class="btn btn-light btn-pill" href="{{ route('admin.users.index') }}">Cancel</a>
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
                            @if($user->roles->contains($key)) checked @endif
                            >
                        <label class="form-check-label" for="role">
                        {{ $role }}
                        </label>
                    </div>
                @endforeach
            @endif

            <div class="form-group">
                <label for="social_twitter">Twitter</label>
                <input type="text" 
                    class="form-control" 
                    id="social_twitter" 
                    name="social_twitter" 
                    value="{{ old('social_twitter', $user->occupation) }}">
                <span class="mt-2 d-block text-danger">
                    @error('social_twitter') {{ $message }} @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="social_facebook">Facebook</label>
                <input type="text" 
                    class="form-control" 
                    id="social_facebook" 
                    name="social_facebook" 
                    value="{{ old('social_facebook', $user->social_facebook) }}">
                <span class="mt-2 d-block text-danger">
                    @error('social_facebook') {{ $message }} @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="social_instagram">Instagram</label>
                <input type="text" 
                    class="form-control" 
                    id="social_instagram" 
                    name="social_instagram" 
                    value="{{ old('social_instagram', $user->social_instagram) }}">
                <span class="mt-2 d-block text-danger">
                    @error('social_instagram') {{ $message }} @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="social_linkedin">LinkedIn</label>
                <input type="text" 
                    class="form-control" 
                    id="social_linkedin" 
                    name="social_linkedin" 
                    value="{{ old('social_linkedin', $user->social_linkedin) }}">
                <span class="mt-2 d-block text-danger">
                    @error('social_linkedin') {{ $message }} @enderror
                </span>
            </div>

            <div class="form-check d-inline-block mr-3 mb-3">
                <input class="form-check-input" 
                    type="checkbox" 
                    id="role" 
                    name="is_team" 
                    value="{{ $user->is_team }}"
                    @if($user->is_team) checked @endif
                    >
                <label class="form-check-label" for="role">
                Team
                </label>
            </div>
        </div>
    </div>
  </form>