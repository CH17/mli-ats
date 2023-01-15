@extends('layouts.app')

@section('content')

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        
        <div class="reset-password-success-msg">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>

        <div>
            <h2 class="reset-password-title">Reset Password</h2>
        </div>

        <form class="m-t" role="form" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" placeholder="Email Address" autocomplete="email" autofocus>
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
        @error('email') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror

    </div>
</div>

@endsection