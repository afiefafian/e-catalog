@extends('layouts.admin.dashboard')

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
                    <th>Email</th>
                    <th>Umur</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection


@push('js')

@

<script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
    var table, save_method;
    $(function(){
        
        table = $('.table').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "{{ url('supplierdata') }}",
                "type" : "GET"
            }
        });
        
        
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        
        $('#form-tambah').on('submit', function(e){
            if(!e.isDefaultPrevented()){
                
                var id = $('#id').val();
                
                if(save_method == "add") url = "{{url('supplier')}}";
                else url = "supplier/"+id;
                
                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#form-tambah').serialize(),
                    dataType: 'JSON',
                    
                    success : function(data){
                        if((data.message)){
                            
                            $('body').css('padding-right','0');
                            $('#modal-tambah').modal('hide');
                            swal('Good job!','Berhasil Menyimpan Data','success');
                            
                            table.ajax.reload();
                        }
                        else{
                            
                            $.each( data, function( key, value ) {
                                $('[name="'+key+'"]').parent().parent().addClass('has-error'); 
                                $('[name="'+key+'"]').next().text(value); 
                            });
                            swal('Oops...','Gagal Menyimpan!','error');
                        }
                    }
                    
                });
                return false;
            }
        });
        
    });
    
    function add()
    {
        save_method = 'add';
        $('input[name=_method]').val('POST');
        $('#form-tambah')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal-tambah').modal('show');
        $('.modal-title').text('Tambah Data');
    }
    
    
    function edit(id){
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#form-tambah')[0].reset();
        $('.form-group').removeClass('has-error'); 
        $('.help-block').empty();
        $.ajax({
            url : "supplier/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data){
                $('#modal-tambah').modal('show');
                $('.modal-title').text('Edit Data');
                
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
    
    function delete_supplier(id)
    {
        
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

