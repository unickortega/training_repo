@extends('layouts.app')
<?php $page = 'Dashboard'; ?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                        <span class='close' data-dismiss='alert'>&times;</span>
                        You are logged in!
                    </div>
                    

                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0) 
                     <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="{{url('posts/'.$post->id .'/edit')}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'Post', 'class' => 'float-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('DELETE', ['class' => 'btn btn-danger'])}} 
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table> 
                    @else 
                        <hr>
                        <p>No posts yet!</p>
                    @endif  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
