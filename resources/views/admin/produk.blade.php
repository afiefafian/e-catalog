@extends('layouts.admin.dashboard')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('plugin/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.18/r-2.2.2/datatables.min.css"/>
@endsection

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Produk</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <button type="button" id="btn-tambah" onclick='add()' class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Tambah</button>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table id="tabel-data" class="table table-striped table-hover no-footer" role="grid" aria-describedby="tabel-data_info" style='width:100%;'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>Harga Jual</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


{{-- tabel input data --}}
@component('layouts.admin.components.modal')
@slot('content')
<form id="form-tambah" data-parsley-validate action="">
    {{ csrf_field() }} {{ method_field('POST') }}
    <div class="form-horizontal">
        <input id="id" name="id" type='hidden'>
        
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Nama Produk</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="nama" name="nama" class="required form-control input-xs" placeholder="Nama Produk" type="text" >
                <span class="help-block"></span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Supplier</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <select id="supplier_id" name="supplier_id" class="form-control">
                    <option value="">Pilih Supplier ...</option>
                    @foreach($suppliers as $supplier)
                    <option value='{{$supplier->id}}'>{{$supplier->nama}}</option>
                    @endforeach
                </select>
                <span class="help-block"></span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Harga Jual</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="harga" name="harga" class="required form-control input-xs" placeholder="Harga Jual" type="number" >
                <span class="help-block"></span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Status</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="active" name="active"> Aktif
                    </label>
                </div>
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Gambar</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="gambar" name="gambar" class="required form-control input-xs"type="file">
                <span class="help-block"></span>
                <img src="" id="gambar-tag" width="200px" />
            </div>
        </div>
    </div>
    
</form>
@endslot
@endcomponent

@endsection


@push('js')

{{-- <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ url('plugin/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
<script>
    var table, save_method;
    $(function(){
        
        
        table = $('#tabel-data').DataTable({
            "processing" : true,
            "responsive": true,
            "ajax" : {
                "url" : "{{ url('admin/produk_data') }}",
                "type" : "GET"
            },
            "order": [[ 0, "desc" ]]
        });
    });
    
    $(document).on('click', '#btn-simpan-act', function() {
        
        $('#btn-simpan-act').html('Menyimpan ...').prop('disabled', true);
        
        var id = $('#id').val();
        if(save_method == "add") {
            url = "{{ url('admin/produk' )}}";
        } else {
            url = "{{ url('admin/produk')}}/"+id;
        }
        
        $.ajax({
            url : url,
            type : "POST",
            data : $('#form-tambah').serialize(),
            dataType: 'JSON',
            success : function(data){
                if((data.message)){
                    $('body').css('padding-right','0');
                    $('#modals-data').modal('hide');
                    swal('Good job!','Berhasil Menyimpan Data','success');
                    
                    table.ajax.reload();
                } else {
                    
                    $('#btn-simpan-act').html('Simpan').prop('disabled', false);
                    
                    clearErrorInput();
                    
                    $.each( data, function( key, value ) {
                        $('[name="'+key+'"]').parent().parent().addClass('has-error'); 
                        $('[name="'+key+'"]').next().text(value); 
                    });
                    
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#btn-simpan-act').html('Simpan').prop('disabled', false);
                
                swal('Oops...','Terdapat gangguan server!','error');
            }
            
        });
    });
    
    var clearErrorInput = function() {
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
    }
    
    var add = function() {
        save_method = 'add';
        $('input[name=_method]').val('POST');
        $('#form-tambah')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('.modal-title').text('Tambah Data');
        $('#btn-simpan-act').html('Simpan').prop('disabled', false);
        $('#modals-data').modal('show');
    }
    
    
    var edit = function(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#form-tambah')[0].reset();
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty();
        $('.modal-title').text('Edit Data');
        $('#btn-simpan-act').html('Simpan').prop('disabled', false);
        $.ajax({
            url : "produk/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data){
                $('#modals-data').modal('show');
                
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#supplier_id').val(data.supplier_id);
                $('#harga').val(data.harga);

                if (data.active) {
                    $('#active').prop('checked', true);
                } else {
                    $('#active').prop('checked', false);
                }

                if (data.url_gambar != null || data.url_gambar != '') {
                    var src = "/public/images/barang/"+data.url_gambar;
                    $('#gambar-tag').attr('src', src);
                }
                
            },
            error : function(){
                swal('Oops...','Gagal Menampilkan Data!','error');
            }
        });
    }
    
    var delete_supplier = function(id) {
        
        swal({
            title: 'Are you sure?', 
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel please!",   
            
        })
        .then(result => {
            if (result.value) {
                
                $.ajax({
                    url : "produk/"+id,
                    type: "POST",
                    data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
                    success: function(data)
                    {
                        table.ajax.reload();   
                        swal('Good job!','Berhasil Mengapus Data','success');
                        
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal('Oops...','Gagal Menghapus Data!','error');
                    }
                });
            } 
        });
    }
</script>
@endpush

