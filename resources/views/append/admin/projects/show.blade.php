<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.projects.edit', $project->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $project->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $project->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{ $project->slug }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $project->description }}</td>
            </tr>
            <tr>
                <th>Url</th>
                <td>{{ $project->url }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $project->category->name }}</td>
            </tr>
            <tr>
                <th>Client</th>
                <td>{{ $project->client->name }}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{ $project->created_at }}</td>
            </tr>
            <tr>    
                <th>Is Published</th>
                <td>    
                    <input disabled 
                    type="checkbox" 
                    @if($project->is_published) checked @endif>
                </td>
            </tr>
            <tr>
                <th>Published at</th>
                <td>{{ $project->published_at }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{!! $project->content !!}</td>
            </tr>                   
        </tbody>
    </table>

    <table>
        <tr>
            <th>Images</th>
        </tr> 
        @foreach($project->getImages() as $image)
            <tr>
                <td>
                    <img class="img img-fluid mb-3" 
                        src="{{ asset('storage/'. env('THEME') . '/images/projects/' . $image) }}" alt="">
                </td>
            </tr>
        @endforeach
    </table>
</div>