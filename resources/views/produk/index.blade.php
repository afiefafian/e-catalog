<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lapak Sebelah</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Styles -->
    <link href="{{ asset('css/produk.css') }}" rel="stylesheet">
    
    <style>
        .navbar-default {
            background-color: transparent;
            border: none;
        }
        /* .navbar {
            position: relative;
        } */
        .navbar-brand {
            position: absolute;
            left: 50%;
            margin-left: -50px !important;  /* 50% of your logo width */
            display: block;
            font-weight: 600;
            color: #FEFCFB !important;
        }
        .footer {
            margin: 100px 0 0 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" style="z-index: 1000; margin-bottom: 0; position: absolute; width: 100%;">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">LapakSebelah</a>
            </div>
        </div>
    </nav>
    
    <div class="jumbotron  text-center" style="height: 75vh; background-color: #0A1128; color: #FEFCFB; ">
        <div class="container">
            <h1 style="margin-top: 130px;">Hello, world!</h1>
            <p>LapakSebelah yang paling kekinian</p>
        </div>
    </div>

    <div class="container" id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h3>Produk</h3>
                </div>
            </div>
            <router-view></router-view>
        </div>
    </div>
    
    <footer class="footer">
        <div class="container">
            <p class="text-muted"></p>
        </div>
    </footer>
    
</body>
</html>

<script src="{{ asset('js/produk.js') }}"></script>