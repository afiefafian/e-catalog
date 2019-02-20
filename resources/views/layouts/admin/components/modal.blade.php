<div class="modal fade" id="modal-tambah" style="display: none;">
    <form id="form-tambah" data-parsley-validate="{{url('admin_aplikasi')}}" method="POST" action="">
    {{ csrf_field() }} {{ method_field('POST') }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Tambah data</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                          <input id="id" name="id" type='hidden'>
                        <div class="form-group" id='karyawanform'>
                            <label class="col-md-4 col-sm-4 col-xs-12 control-label">Karyawan</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                
                               <select id="karyawan" name="karyawan" class="form-control">
                                    @foreach($karyawan as $karyawan)
                                    <option value='{{$karyawan->id}}'>{{$karyawan->nama_karyawan}}</option>
                                    
                                    @endforeach

                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group" id='pass1'>
                            <label class="col-md-4 col-sm-4 col-xs-12 control-label">Password</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                
                                <input id="password" name="password" class="required form-control input-xs" placeholder="Password" type="password" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                       
                        <div class="form-group" id='pass2'>
                            <label class="col-md-4 col-sm-4 col-xs-12 control-label">Konfirmasi Password </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="password_confirmation" name="password_confirmation" class="required form-control input-xs" placeholder="Konfirmasi Password" type="password" >
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group" id='roleform'>
                            <label class="col-md-4 col-sm-4 col-xs-12 control-label">Role</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select id="role" name="role" class="form-control">
                                    @foreach($roles as $role)
                                    <option value='{{$role->id}}'>{{$role->name}}</option>
                                    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button data-dismiss="modal" class="btn btn-warning" type="button">Batal</button>
                        <button id="simpan" class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>