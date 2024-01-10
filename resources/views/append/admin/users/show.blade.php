<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.users.edit', $user->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a class="btn" href="{{ route('admin.users.index') }}">
         Cancel
    </a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Has roles</th>
            <td>
                @if($user->roles->isNotEmpty())
                    @foreach ($user->roles as $role)
                        <a href="{{ route('admin.roles.show', $role->id) }}">
                            {{ $role->name }}
                        </a>
                        @if (!$loop->last) | @endif 
                    @endforeach
                @endif
            </td>
        </tr>
        <tr>
            <th>Occupation</th>
            <td>{{ $user->occupation }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $user->description }}</td>
        </tr>
        <tr>
            <th>Twitter</th>
            <td>{{ $user->social_twitter }}</td>
        </tr>
        <tr>
            <th>Facebook</th>
            <td>{{ $user->social_facebook }}</td>
        </tr>
        <tr>
            <th>Instagram</th>
            <td>{{ $user->social_instagram }}</td>
        </tr>
        <tr>
            <th>LinkedIn</th>
            <td>{{ $user->social_linkedin }}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img class="img img-fluid mb-3" 
                    src="{{ asset('storage/'. env('THEME') . '/images/team/' . $user->image) }}" alt="">
            </td>
        </tr>
        <tr>
            <th>Team</th>
            <td>
                <input disabled 
                    type="checkbox" 
                    @if($user->is_team) checked @endif>
            </td>
        </tr>
    </table>
</div>