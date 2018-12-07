@extends('layouts.app')
@section('content')
<?php $page = 'Services';?>
<h1>Services</h1>
<div class="row">
        <div class="col-sm-6">
                <div class="card">
                <img class="card-img-top cover" src="{{url('/storage/carousel_images/p9.jpg')}}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Manage Posts</h5>
                {{-- <p class="card-text"></p> --}}
                <div class="card" style="width: 100%;">
                        <ul class="list-group list-group-flush">
                                <li class="list-group-item">Accessing the Posts Page and adding a new post</li>
                                <li class="list-group-item">Configuring your new Post</li>
                                <li class="list-group-item">Editing or Deleting a Post</li>
                        </ul>
                </div><br>
                <a href="{{url('home')}}" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
        </div>
        <div class="col-sm-6">
                <div class="card">
                <img class="card-img-top cover" src="{{url('/storage/carousel_images/p8.jpg')}}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Manage Your Blog</h5>
                <div class="card" style="width: 100%;">
                                <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Know our audience</li>
                                        <li class="list-group-item">Love what we do and it shows</li>
                                        <li class="list-group-item">Consistency about blogging</li>
                                </ul>
                        </div><br>
                <a href="{{url('posts')}}" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
        </div>
        </div>
        <br>
@endsection
