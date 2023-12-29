<div class="col-md-12">
    {{-- table with elements --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if($items->isNotEmpty())
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a class="btn btn-app" href="{{ route('admin.users.show', $item->id) }}">
                                <i class="fas fa-eye"></i> Show
                            </a>

                            <a class="btn btn-app" href="{{ route('admin.users.edit', $item->id) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                                
                            <button class="btn btn-app" type="submit">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <!-- /.card-footer pagination -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{ $items->links() }}
        </ul>
    </div>
<!-- /.card-footer -->
</div>