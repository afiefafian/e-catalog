@extends('layouts.dashboard.main')

@section('css')
@endsection

@section('content')

<div class="page-main">
    
    @include('layouts.dashboard.partial._nav-head')
    
    @include('layouts.dashboard.partial._nav-menu')
    
    <div class="my-3 my-md-5" id="app">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    Supplier
                </h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data</h3>
                            <div class="card-options">
                                <button type="button" class="btn btn-outline-primary" onclick="btnModalFunc(1)"><i class="fe fe-plus mr-2"></i>Tambah</button>
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

@component('dashboard.components.modal')
@slot('content')
<form action="#" id="form-modal">
        <div class="form-group">
            <label class="form-label">Nama<span class="form-required">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" />
        </div>
        <div class="form-group">
            <label class="form-label">E-mail<span class="form-required">*</span></label>
            <input type="email" class="form-control" name="email" id="email" />
        </div>
        <div class="form-group">
            <label class="form-label">Kota Asal<span class="form-required">*</span></label>
            <select class="form-control" id="kota_asal" name="kota_asal">
                <option value="3374">Alabama</option>
            </select>
            {{-- <input type="text" class="form-control" id="kota_asal" name="kota_asal" value="3374" /> --}}
        </div>
        <div class="form-group mb-0">
            <label class="form-label">Tahun Lahir<span class="form-required">*</span></label>
            <input type="number" class="form-control" name="thn_lahir" value="1998" />
        </div>
</form>
@endslot
@endcomponent

@include('layouts.dashboard.partial._footer')

@endsection

@section('js')

<!-- Include Choices JavaScript -->
{{-- <script src="https://cdn.jsdelivr.net/npm/choices.js@4/public/assets/scripts/choices.min.js"></script> --}}

<script>
    // var element = document.getElementById('kota_asal');
    // var example = new Choices(element);

    // example.ajax(function(callback) {
    // fetch(url)
    //     .then(function(response) {
    //     response.json().then(function(data) {
    //         callback(data, 'value', 'label');
    //     });
    //     })
    //     .catch(function(error) {
    //     console.log(error);
    //     });
    // });

    var save_method;
    var btnModalFunc = (type) => {
        save_method = type;
        
        if (type == 1) {
            $('#form-modal')[0].reset();
            // $('.form-group').removeClass('has-error').removeClass('has-success');
            // $('.text-danger').remove();
            // $('[name="kd"]').parent().parent().attr('hidden',true);
            $('.modal-title').text('Tambah');
            $('#modal').modal('show');
        }
    }
    
</script>
@endsection