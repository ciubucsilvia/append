<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.post-categories.edit', $postCategory->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a class="btn btn-light" href="{{ route('admin.post-categories.index') }}">Cancel</a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $postCategory->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $postCategory->name }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $postCategory->slug }}</td>
            </tr>   
        </tbody>
    </table>
</div>