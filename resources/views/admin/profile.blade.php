@extends('layouts.admin.dashboard')

@section('content')

<div class="col-md-8 col-sm-8 col-xs-12">
    <div class="x_panel">
        <!-- <div class="x_title">
            <h2>Profile</h2>
            <div class="clearfix"></div>
        </div> -->
        
        <!-- <div class="x_content"> -->
            <div class="col-xs-3">
                <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#profile" data-toggle="tab">Profile</a>
                    </li>
                    <li><a href="#password" data-toggle="tab">Ganti Password</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-9">
                
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <form action="#" id="form2" class="form-horizontal">
                            <div class="form-group text-center">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <img src="https://laundry.afiefafian.com/assets/images/foto_profile/35841b976f31bd96b2b083feb91f599f.jpg" class="photo_profile" alt="profile" style="width: 150px; height: 150px; border-radius: 50%;">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a class="btn btn-link btn-xs" onclick="modalPhoto()">Ganti Foto Profil</a>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">E-mail</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama User</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" type="text" name="name">
                                </div>
                            </div>
                            <br>
                        </form>

                    </div>
                    <div class="tab-pane" id="profile">Profile Tab.</div>
                    <div class="tab-pane" id="messages">Messages Tab.</div>
                    <div class="tab-pane" id="settings">Settings Tab.</div>
                    
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- </div> -->
        </div>
    </div>
    @endsection