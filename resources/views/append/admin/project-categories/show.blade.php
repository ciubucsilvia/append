<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.project-categories.edit', $projectCategory->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $projectCategory->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $projectCategory->name }}</td>
            </tr>   
        </tbody>
    </table>
</div>