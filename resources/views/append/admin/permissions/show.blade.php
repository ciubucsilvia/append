<div class="col-md-12">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $permission->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $permission->name }}</td>
        </tr>
        <tr>
            <th>Has roles</th>
            <td>
                @if($permission->roles->isNotEmpty())
                    @foreach ($permission->roles as $role)
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