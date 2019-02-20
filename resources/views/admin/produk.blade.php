@extends('layouts.admin.dashboard')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Produk</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <button type="button" id="btn-tambah" onclick='add()' class="btn btn-primary">Tambah</button>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <p>Anda Sudah Login</p>
    </div>
</div>

@endsection