<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.tags.edit', $tag->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a class="btn btn-light" href="{{ route('admin.tags.index') }}">Cancel</a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $tag->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $tag->name }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $tag->slug }}</td>
            </tr>   
        </tbody>
    </table>
</div>