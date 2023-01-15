@extends('layouts.app')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div class="col-md-12">

        <div>
            <h2 class="login-title">{{ __('Reset Password') }}</h2>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" placeholder="Email Address" autocomplete="email" autofocus>
            </div>

            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Password" autocomplete="new-password">
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    placeholder="Confirm Password" autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">
                {{ __('Reset Password') }}
            </button>
        </form>
        @error('email') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror
        @error('password') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror
        @error('password_confirmation') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror
    </div>
</div>

@endsection