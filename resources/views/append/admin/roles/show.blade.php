<div class="col-md-12">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $role->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $role->name }}</td>
        </tr>
        <tr>
            <th>Has permissions</th>
            <td>
                @if($role->permissions->isNotEmpty())
                    @foreach ($role->permissions as $permission)
                        <a href="{{ route('admin.permissions.show', $permission->id) }}">
                            {{ $permission->name }}
                        </a>
                        @if (!$loop->last) | @endif 
                    @endforeach
                @endif
            </td>
        </tr>
    </table>
</div>