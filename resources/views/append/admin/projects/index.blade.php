<div class="col-md-12">
    {{-- table with elements --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Published</th>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if($items->isNotEmpty())
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <input disabled 
                        type="checkbox" 
                        @if($item->is_published) checked @endif>
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <form action="{{ route('admin.projects.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a class="btn btn-app" href="{{ route('admin.projects.show', $item->id) }}">
                                <i class="fas fa-eye"></i> Show
                            </a>

                            <a class="btn btn-app" href="{{ route('admin.projects.edit', $item->id) }}">
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