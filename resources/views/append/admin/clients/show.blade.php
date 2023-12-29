<div class="col-md-12">
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $client->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $client->name }}</td>
            </tr>
            <tr>    
                <th>Active</th>
                <td>    
                    <input disabled 
                    type="checkbox" 
                    @if($client->active) checked @endif>
                </td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img class="img img-fluid mb-3" 
                        src="{{ asset('storage/'. env('THEME') . '/images/clients/' . $client->image) }}" alt="">
                </td>
            </tr>                    
        </tbody>
    </table>
</div>