<div class="container">
    @if(isset($post))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample Post details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>