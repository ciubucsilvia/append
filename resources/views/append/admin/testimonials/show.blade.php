<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.testimonials.edit', $testimonial->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a class="btn" href="{{ route('admin.testimonials.index') }}">Cancel</a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $testimonial->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $testimonial->name }}</td>
            </tr>
            <tr>
                <th>Occupation</th>
                <td>{{ $testimonial->occupation }}</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td>{{ $testimonial->rating }}</td>
            </tr>
            <tr>
                <th>Message</th>
                <td>{!! $testimonial->message !!}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img class="img img-fluid mb-3" 
                        src="{{ asset('storage/'. env('THEME') . '/images/testimonials/' . $testimonial->image) }}" alt="">
                </td>
            </tr>                    
        </tbody>
    </table>
</div>