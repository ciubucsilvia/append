<div class="col-md-12">
    <a class="btn btn-app" href="{{ route('admin.questions.edit', $question->id) }}">
        <i class="fas fa-edit"></i> Edit
    </a>
    {{-- table with elements --}}
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $question->id }}</td>
            </tr>
            <tr>
                <th>Question</th>
                <td>{{ $question->question }}</td>
            </tr> 
            <tr>
                <th>Answer</th>
                <td>{{ $question->answer }}</td>
            </tr> 
            <tr>
                <th>Question nr. </th>
                <td>{{ $question->sort }}</td>
            </tr>   
        </tbody>
    </table>
</div>