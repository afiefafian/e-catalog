@extends('layouts.dashboard.main')

@section('content')

<div class="page-main">
    
    @include('layouts.dashboard.partial._nav-head')
    
    @include('layouts.dashboard.partial._nav-menu')
    
    <div class="my-3 my-md-5" id="app">
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
                            
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.dashboard.partial._footer')

@endsection
