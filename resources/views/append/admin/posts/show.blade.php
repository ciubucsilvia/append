<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.posts.edit', $post->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $post->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $post->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $post->slug }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $post->category->name }}</td>
            </tr>
            <tr>    
                <th>Is Published</th>
                <td>    
                    <input disabled 
                    type="checkbox" 
                    @if($post->is_published) checked @endif>
                </td>
            </tr>
            <tr>
                <th>Published at</th>
                <td>{{ $post->published_at }}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{ $post->created_at }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{!! $post->content !!}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img class="img img-fluid mb-3" 
                        src="{{ asset('storage/'. env('THEME') . '/images/posts/' . $post->image) }}" alt="">
                </td>
            </tr>                    
        </tbody>
    </table>
</div>