@extends('layouts.app')
@section('content')
<?php $page = 'Home';?>
{{-- <div class="jumbotron text-center">
<h1>{{$title}}</h1>
<p>This is the laravel application from the "Laravel From Scartch" Youtube series</p>    
<p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> 
   <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p> --}}
 <h2 style="text-align:center">Color Your Blog</h2>  

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner center">
        <div class="carousel-item active item">
            <img class="d-block w-100 cover" src="{{url('/storage/carousel_images/p7.jpg')}}" alt="Photography">
            <div class="carousel-caption d-none d-md-block">
                <h5>Photography</h5>
                <p>Freeze the moment</p>
            </div>
        </div>
        <div class="carousel-item item">
            <img class="d-block w-100 cover" src="{{url('/storage/carousel_images/p2.jpg')}}" alt="Multimedia">
            <div class="carousel-caption d-none d-md-block">
                <h5>Multimedia</h5>
                <p>Animate the moment</p>
            </div>
        </div>
        <div class="carousel-item item">
            <img class="d-block w-100 cover" src="{{url('/storage/carousel_images/p3.jpg')}}" alt="Adventure">
            <div class="carousel-caption d-none d-md-block">
                <h5>Adventure</h5>
                <p>Live the life of your dreams</p>
            </div>
        </div>
        <div class="carousel-item item">
            <img class="d-block w-100 cover" src="{{url('/storage/carousel_images/p6.jpg')}}" alt="Art">
            <div class="carousel-caption d-none d-md-block">
                <h5>Art</h5>
                <p>Creation of beauty</p>
            </div>
        </div>
        <div class="carousel-item item">
            <img class="d-block w-100 cover" src="{{url('/storage/carousel_images/p5.jpg')}}" alt="Dance">
            <div class="carousel-caption d-none d-md-block">
                <h5>Dance</h5>
                <p>Dance on the edges of time</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endsection

