@extends('layouts.app')

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

                    @if (Auth::User()->company()->count() == 0)
                    <h2>Welcome!</h2>
                    It looks like your company is not set up yet. Please click <a href="{{url('home/profile/create')}}">here</a> to begin!
                    @else
                      <h2>Welcome!</h2>
                      <div>
                        We are {{ $company->name }}
                      </div>
                      <div>
                        About: {{ $company->about }}
                      </div>
                      <div>
                        We are located at {{ $company->address}} and can be contact via {{ $company->contact}} or {{ $company->email }}
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
