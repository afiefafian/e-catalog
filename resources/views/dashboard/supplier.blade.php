@extends('layouts.dashboard.main')

@section('content')

<div class="page-main">
    
    @include('layouts.dashboard.partial._nav-head')
    
    @include('layouts.dashboard.partial._nav-menu')
    
    <div class="my-3 my-md-5" id="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Supplier</h3>
                            <div class="card-options">
                                <button type="button" class="btn btn-outline-primary"><i class="fe fe-plus mr-2"></i>Tambah</button>
                                {{-- <a href="#" class="btn btn-azure btn-sm">Tambah</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima neque pariatur perferendis sed suscipit velit vitae voluptatem. A consequuntur, deserunt eaque error nulla temporibus!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.dashboard.partial._footer')

@endsection
