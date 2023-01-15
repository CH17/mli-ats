<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserToken;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Validator\UserValidator;

class RegisterController extends Controller
{

    public function index($token)
    {
        $user_token = UserToken::where('token', $token)->first();
        if (!$user_token) {
            return redirect('/login');
        }
        $data['user_token'] = $user_token;
        return view('auth.signup', $data);
    }

    public function store(Request $request, $token)
    {

        $user_token = UserToken::where('token', $token)->first();

        if (!$user_token) {
            return redirect('/login');
        }


        $validation = new UserValidator();

        $validator = $validation->uservalidation($request);


        if ($validator->fails()) {
            return redirect('signup/' . $token)
                ->withErrors($validator)
                ->withInput();
        }       

        $user = new User();
        $user->initials = $request->initials;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->roles()->attach($user_token->role_id);

        $user_token = UserToken::where('token', $token)->delete();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/admin');
        }
    }
}
