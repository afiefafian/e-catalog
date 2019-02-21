<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Styles -->
      <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
      <style>
        input[type=text], 
        input[type=email], 
        input[type=password], 
        input[type=text]:focus, 
        input[type=email]:focus,
        input[type=password]:focus {
          -webkit-box-shadow: none !important;
          -moz-box-shadow: none !important;
          box-shadow: none !important;
        }

        #email, #password {
          height: 42px !important;
          margin-bottom: 0;
        }

        .login {
          background-color: #ffffff;
        }
      </style>
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_header text-center" style="margin-top: 15vh;">
            <img src="{{ asset('svg/catalogue.svg') }}" alt="logo" style="height:60px;">
            <span style="font-weight: 600; font-size: 25px; vertical-align: middle; margin-left: 10px; color: #333333;">E-CATALOG</span>
          </section>
          <section class="login_content">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="form-group">
                 <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group" style="margin-top: 20px;">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div>
                <div class="pull-left">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="separator"></div>
              <div>
                <button type="submit" class="btn btn-dark btn-block" style="padding: 11px;">LOG IN</botton>
              </div>

            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
