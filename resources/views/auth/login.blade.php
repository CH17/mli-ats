@extends('layouts.app')

@section('content')

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>

        <div><h2 class="login-title">Admin Login</h2></div>
        
        
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid has-error @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address"  autocomplete="email" autofocus>
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid has-error @enderror" name="password"  autocomplete="current-password">

            </div>

            <div class="form-group">
                    <div class="text-left"><label> <input type="checkbox"><i></i> Remember me </label></div>
            </div>                     
            

            <button type="submit" class="btn btn-primary block full-width m-b">LOGIN</button>
            <p>
              <a class="btn btn-sm btn-white btn-block" href="{{ route('password.request') }}">
                  <strong>Forget Password?<strong>                        
               </a>
            </p>          
            
            
            @error('email') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror                
            @error('password') <div class="invalid-feedback" role="alert">{{ $message }}</div> @enderror   
                
        </form>
       
    </div>
</div>

@endsection
