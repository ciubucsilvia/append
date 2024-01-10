<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.features.edit', $feature->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $feature->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $feature->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $feature->slug }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{!! $feature->content !!}</td>
            </tr>
            <tr>    
                <th>Active</th>
                <td>    
                    <input disabled 
                    type="checkbox" 
                    @if($feature->active) checked @endif>
                </td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img class="img img-fluid mb-3" 
                        src="{{ asset('storage/'. env('THEME') . '/images/features/' . $feature->image) }}" alt="">
                </td>
            </tr>                    
        </tbody>
    </table>
</div>