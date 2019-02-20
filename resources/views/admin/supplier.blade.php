@extends('layouts.admin.dashboard')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('plugin\bootstrap-datetimepicker-master\build\css\bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Supplier</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <button type="button" id="btn-tambah" onclick='add()' class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Tambah</button>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table id="tabel-data" class="tabletable-striped table-hover no-footer" role="grid" aria-describedby="tabel-data_info" style='width:100%;'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kota</th>
                    <th>Umur</th>
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
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Nama</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="nama" name="nama" class="required form-control input-xs" placeholder="Nama" type="text" >
                <span class="help-block"></span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Email</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="email" name="email" class="required form-control input-xs" placeholder="Email" type="email" >
                <span class="help-block"></span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Kota</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <select id="kota_select" name="kota_asal" class="required form-control input-xs" style="width: 100% !important;">
                </select>
                {{-- <input type="hidden" name="kota_asal"> --}}
                <span class="help-block"></span>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tahun Lahir</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="thn_lahir" name="thn_lahir" class="required form-control input-xs" placeholder="Tahun Lahir" type="text" >
                <span class="help-block"></span>
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

<script>
    var table, save_method;
    $(function(){
        
        $('#kota_select').select2({
            placeholder: "Pilih Kota / Kab ...",
            minimumInputLength: 0,
            ajax: {
                url: '{{ url("admin/kab_kota_list") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                delay: 300,
                dataType: 'json',
                data: function (params) {
                    return {
                        keyword: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        
        moment.locale('id');
        $('#thn_lahir').datetimepicker({
            locale: 'id',
            format: 'YYYY'
        });
        
        table = $('.table').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "{{ url('supplierdata') }}",
                "type" : "GET"
            }
        });
    });
    
    $(document).on('click', '#btn-simpan-act', function() {
        
        $('#btn-simpan-act').html('Menyimpan ...').prop('disabled', true);
        
        var id = $('#id').val();
        if(save_method == "add") {
            url = "{{ url('admin/supplier' )}}";
        } else {
            url = "{{ url('admin/supplier/')}}"+id;
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
                    
                    // table.ajax.reload();
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
            url : "supplier/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data){
                $('#modals-data').modal('show');
                
                $('#id').val(data.id_supplier);
                $('#kode').val(data.kode_supplier);
                $('#nama').val(data.nama_supplier);
                $('#alamat').val(data.alamat_supplier);
                $('#no_telp1').val(data.no_telp1_supplier);
                $('#no_telp2').val(data.no_telp1_supplier);
                $('#email_supplier').val(data.email_supplier);
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
                    url : "supplier/"+id,
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

