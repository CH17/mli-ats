<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users\RoleLists;
use App\Formatter\UserTokenFormatter;
use App\UserToken;

use App\Validator\TokenValidator;

class UserTokenController extends Controller
{

    public function create()
    {
        // $roles = new RoleLists();
        // $data['roles'] = $roles->roles();

        // return view('backend/user/create', $data);
    }


    public function store(Request $request)
    {

        $validation = new TokenValidator();

        $validator = $validation->uservalidation($request);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $user_token = new UserTokenFormatter();
        $data = $user_token->formate($request);        
        $token = UserToken::create($data);

        $details['email'] = $data['email'];
        $details['token'] = $data['token'];
        $details['name'] = $data['name'];
        

        if ($token) {
            return response()->json([
                'success'  => true,
                'message'  => 'User Created Successfully.',
                'url'      => route('user.signup', $data['token'])

            ]);
        }
    }
}
