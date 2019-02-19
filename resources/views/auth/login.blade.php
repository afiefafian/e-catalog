@extends('layouts.dashboard.main')

@section('title', 'Login | ')

@section('content')
<div class="page-single">
  <div class="container">
    <div class="row">
      <div class="col col-login mx-auto" id="app">
        <div class="text-center mb-6">
          {{-- E-Catalog --}}
          <img src="./template/tabler-ui/demo/brand/tabler.svg" class="h-6" alt="">
        </div>
        <form class="card" action="{{ route('login') }}" method="post">
          @csrf
          <div class="card-body p-6">
            <div class="card-title">Login to your account</div>
            <div class="form-group">
              <label class="form-label">{{ __('E-Mail Address') }}</label>
              <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Enter email"  name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label class="form-label">
                {{ __('Password') }}
              </label>
              <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password" name="password" required>
              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                <span class="custom-control-label">{{ __('Remember Me') }}</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
