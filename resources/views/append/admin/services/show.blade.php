<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.services.edit', $service->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $service->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $service->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $service->slug }}</td>
            </tr>
            <tr>
                <th>Icon</th>
                <td>{{ $service->icon }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $service->description }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{!! $service->content !!}</td>
            </tr>
            <tr>    
                <th>Active</th>
                <td>    
                    <input disabled 
                    type="checkbox" 
                    @if($service->active) checked @endif>
                </td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img class="img img-fluid mb-3" 
                        src="{{ asset('storage/'. env('THEME') . '/images/services/' . $service->image) }}" alt="">
                </td>
            </tr>                    
        </tbody>
    </table>
</div>