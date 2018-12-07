@extends('layouts.app')
@section('content')
<?php $page = 'Posts';?>
    <h1>Posts</h1>
    {{-- {!! Form::button('<i class="fa fa-plus"></i> Create Post', array('class' => 'btn btn-primary', 'type' => 'submit')) !!} --}}
    <button class="btn btn-primary" onclick="location.href='{{ url('posts/create') }}'">
        Create Post
    </button>
    <br><br>
    
    @if(count($posts) >0 )
        @foreach ($posts as $post)
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:40%" src="{{ url('/storage/cover_images/', $post->cover_image)}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="{{url('posts/'.$post->id)}}"> {{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        <?php 
                            // $user_id = Auth::User()->id;
                            $like = App\Like::where('post_id', $post->id)->get();
                            $no_likes = App\Like::where('post_id', $post->id)->count();
                        ?>
                        @if(count($like) > 0)
                            <button type="button" class="btn btn-primary btn-sm likeButton" data-id="{{$post->id }}" id = "<?php echo 'likeButton'.$post->id; ?>" style="float:right;">
                                <span class="glyphicon glyphicon-thumbs-up">Liked</span> 
                            </button>
                        @else
                            <button type="button" class="btn btn-primary btn-sm likeButton" data-id="{{$post->id}}" id = "<?php echo 'likeButton'.$post->id; ?>" style="float:right;">
                                <span class="glyphicon glyphicon-thumbs-up">Like</span> 
                            </button>
                        @endif
                        <span id = "<?php echo 'nolikes'.$post->id; ?>" >Likes: {{$no_likes}}</span>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div> 
            
        @endforeach
        {{$posts->links()}}
    @else 
        <p>No posts found.</p>
    @endif
<script>
    $(document).ready(function () {
        //like button trigger
        // var postId = $(this).attr('cid');
        // var postId = $(this).data("id");
        // window.alert(postId);
        $('.likeButton').click(function(){
            var postId = $(this).data("id");
            var tempId = $(this).attr("data-id");
            var likeId = "likeButton".concat(tempId); 
            var noLikes = "nolikes".concat(tempId);
            var $this = this;
            var parent = this.parentNode;
            // console.log(parent);
            // window.alert(likeId);
            $.ajax({
                url: '{{url("likes_main")}}',
                type: 'GET',
                data: { post_id: postId },
                success: function(response)
                {
                    // $('#something').html(response);
                    if(response == 0)
                    {
                        $this.innerHTML = "Like";
                        $.ajax({
                            url: '{{url("likes")}}',
                            type: 'GET',
                            data: { post_id: postId },
                            success: function(response)
                            {
                                parent.getElementsByTagName('span')[0].innerHTML = 'Likes:'+ response;
                            }
                        })
                    }    
                    else
                    {
                        $this.innerHTML = "Liked";
                        $.ajax({
                            url: '{{url("likes")}}',
                            type: 'GET',
                            data: { post_id: postId },
                            success: function(response)
                            {
                                // window.alert($(this).data("id")); 
                                parent.getElementsByTagName('span')[0].innerHTML = 'Likes:'+ response;
                            }
                        })
                        
                    }
                        
                }
            })
        });
    });
</script>
    
@endsection
