<?php

namespace App\Http\Controllers;

use App\Formatter\UserUpdateFormatter;
use App\User;
use App\Validator\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show(User $user)
    {
        $data['user'] = $user;
        return view('backend/profile/show', $data);
    }


    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('backend/profile/edit-profile', $data); 
    }

    public function update(Request $request)
    {

        $user = Auth::user();

        $validation = new UserValidator();

        $validator = $validation->userProfileValidation($request, $user);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }


        $user_data = new UserUpdateFormatter();
        $data = $user_data->formate($request);
        $user->update($data);


        return response()->json([
            'success' => true,
            'message' => 'Updated Successfully.'
        ]);
    }
}
