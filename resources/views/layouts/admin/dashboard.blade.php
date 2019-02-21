<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  
  <title>{{ config('app.name', 'Laravel') }}</title>
  
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
  <!-- Styles -->
  @yield('css')
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <style>
  .dataTables_filter {
    width: auto;
    /* max-width: 50%; */
  }
  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      
      @include('layouts.admin.partial._sidebar')
      @component('layouts.admin.partial._topnav')
          {{-- @include('layouts.admin.partial._notif') --}}
      @endcomponent

      <!-- page content -->
      <div class="right_col" role="main">
        
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12" id="app">
            @yield('content')
          </div>
        </div>
      </div>
      <!-- /page content -->
      
      <!-- footer content -->
      <footer>
        <div class="pull-right">
          E-Catalog
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>
  
  
  
  <script src="{{ asset('js/admin.js') }}"></script>
  
  @stack('js')
</body>

</html>