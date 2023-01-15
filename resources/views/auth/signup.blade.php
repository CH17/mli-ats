@extends('layouts.app')

@section('content')
<div class="middle-box  loginscreen animated fadeInDown">
    <div>

        <div>
            <h2 class="login-title text-center">Admin Register</h2>
        </div>

        <form method="POST" action="{{ route('user.store',['token'=>$user_token->token]) }}">
            @csrf

            <div class="form-group row">
                <label for="initials" class="text-left">{{ __('Initials') }}</label>

                <input id="initials" type="text" class="form-control @error('initials') is-invalid @enderror"
                    name="initials" value="{{ $user_token->initials }}" required autocomplete="initials" autofocus
                    readonly>

            </div>

            <div class="form-group row">
                <label for="name" class="text-left">{{ __('Name') }}</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ $user_token->name }}" required autocomplete="name" autofocus readonly>

            </div>

            <div class="form-group row">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $user_token->email }}" required autocomplete="email" readonly>


            </div>

            <div class="form-group row">
                <label for="password">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">


            </div>

            <div class="form-group row">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">

            </div>

            <div class="form-group row mb-0">
                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>

            @error('initials') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror
            @error('name') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror
            @error('email') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror
            @error('password') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror

        </form>
    </div>
</div>


@endsection