<div class="col-md-12">
    {{-- <!-- /.btn -->
    <a class="btn btn-lg btn-primary mb-2" 
        href="{{ route('admin.clients.create') }}">
        Create
    </a>   --}}

    {{-- table with elements --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Active</th>
                <th>Name</th>
                <th>Image</th>
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
                        @if($item->active) checked @endif>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td><img class="img img-fluid mb-3" src="{{ asset('storage/'. env('THEME') . '/images/clients/' . $item->image) }}" alt=""></td>
                    <td>
                        <form action="{{ route('admin.clients.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a class="btn btn-app" href="{{ route('admin.clients.show', $item->id) }}">
                                <i class="fas fa-eye"></i> Show
                            </a>

                            <a class="btn btn-app" href="{{ route('admin.clients.edit', $item->id) }}">
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