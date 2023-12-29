<div class="col-md-12">
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
    </table>
</div>