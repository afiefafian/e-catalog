<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en" />
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="theme-color" content="#4188c9">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <link rel="icon" href="./template/tabler-ui/favicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon" type="image/x-icon" href="./template/tabler-ui/favicon.ico" />
  <!-- Generated: 2018-04-16 09:29:05 +0200 -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title> @yield('title') {{ config('app.name', 'Laravel') }}</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
  
  <!-- Dashboard Core -->
  <link href="./template/tabler-ui/assets/css/dashboard.css" rel="stylesheet" />
  <!-- c3.js Charts Plugin -->
  <link href="./template/tabler-ui/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
  <!-- Google Maps Plugin -->
  <link href="./template/tabler-ui/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  @yield('css')

</head>
<body class="">
  <div class="page">

    @yield('content')

  </div>
</body>
</html>

<script src="{{ asset('js/app.js') }}"></script>
<script src="/template/tabler-ui/assets/js/require.min.js"></script>
<script>
  requirejs.config({
    baseUrl: './template/tabler-ui/'
  });
</script>
<!-- Dashboard Core -->
<script src="./template/tabler-ui/assets/js/dashboard.js"></script>

@yield('js')
<!-- c3.js Charts Plugin -->
{{-- <script src="./template/tabler-ui/assets/plugins/charts-c3/plugin.js"></script>
<!-- Google Maps Plugin -->
<script src="./template/tabler-ui/assets/plugins/maps-google/plugin.js"></script>
<!-- Input Mask Plugin -->
<script src="./template/tabler-ui/assets/plugins/input-mask/plugin.js"></script> --}}
