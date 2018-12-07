@extends('layouts.app')
@section('content')
<?php $page = 'Posts';?>
    <br><br>
    <h1>{{$post->title}}</h1>
    <a href="{{url('posts')}}" class="btn btn-default">Go back</a>
    @if(!Auth::guest())
        <?php 
            $user_id = Auth::User()->id;
            $like = App\Like::where('user_id', $user_id)->where('post_id', $post->id)->get();
            $no_likes = App\Like::where('post_id', $post->id)->count();
            // echo $like;
        ?>
        @if(count($like) > 0)
            <button type="button" class="btn btn-primary btn-sm" id="likeButton">
                <span class="glyphicon glyphicon-thumbs-up" id="likebuttontext">Liked</span> 
            </button>
        @else
            <button type="button" class="btn btn-primary btn-sm" id="likeButton">
                <span class="glyphicon glyphicon-thumbs-up" id="likebuttontext">Like</span> 
            </button>
        @endif
    @endif
        <span id="no_likes">Likes: {{$no_likes}}</span><span id="no_likes">Likes: {{$no_likes}}</span>
    <div>
        <img style="width:10%" src="{{ url('/storage/cover_images/', $post->cover_image)}}">
    </div>
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
        <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-warning">Edit</a> 
        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'Post', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('DELETE', ['class' => 'btn btn-danger'])}} 
        {!!Form::close()!!}
    @endif
@endif
<?php 
    $post_id = $post->id;
?>
<script>
        $(document).ready(function () {
            //like button trigger
            var postId = <?php echo $post_id; ?>;
            
            $('#likeButton').click(function(){
                $.ajax({
                    url: '{{url("vote")}}',
                    type: 'GET',
                    data: { post_id: postId },
                    success: function(response)
                    {
                        // $('#something').html(response);
                        if(response == 0)
                        {
                            document.getElementById("likebuttontext").innerHTML = "Like";
                            $.ajax({
                                url: '{{url("likes")}}',
                                type: 'GET',
                                data: { post_id: postId },
                                success: function(response)
                                {
                                    document.getElementById("no_likes").innerHTML = 'Likes:'+ response;
                                }
                            })
                        }    
                        else
                        {
                            document.getElementById("likebuttontext").innerHTML = "Liked";
                            $.ajax({
                                url: '{{url("likes")}}',
                                type: 'GET',
                                data: { post_id: postId },
                                success: function(response)
                                {
                                    document.getElementById("no_likes").innerHTML = 'Likes:'+ response;
                                }
                            })
                            
                        }
                            
                    }
                })
            });
        });
</script>
@endsection
