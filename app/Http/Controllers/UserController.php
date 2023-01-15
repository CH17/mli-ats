<?php

namespace App\Http\Controllers;

use Auth;
use \App\User;
use App\Users\RoleLists;
use Illuminate\Http\Request;
use App\Formatter\UserFormatter;
use App\Validator\UserValidator;
use Illuminate\Support\Facades\DB;
use App\Validator\PasswordValidator;
use Illuminate\Support\Facades\Hash;
use App\Formatter\UserUpdateFormatter;



class UserController extends Controller
{


    public function index()
    {
        $roles = new RoleLists();
        $data['roles'] = $roles->roles();

        $data['user_role'] = Auth::user()->role();

        $users = User::paginate(15);
        $data['users'] = $users;

        return view('backend/user/users', $data);
    }


    public function store(Request $request)
    {

        $validation = new UserValidator();

        $validator = $validation->uservalidation($request);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $user = new UserFormatter();

        $data = $user->format($request);

        $user = User::create($data);

        $user->roles()->attach($request->role_id);


        return response()->json([
            'success'  => true,
            'message'  => 'User Created Successfully.',

        ]);
    }


    public function edit(User $user)
    {
        $roles = new RoleLists();

        $data['roles'] = $roles->roles();

        $data['user_role'] = Auth::user()->role();

        $users = User::paginate(15);

        $data['users'] = $users;

        $data['user'] = $user;

        return view('backend/user/edit-user', $data);
    }


    public function update(Request $request, $id)
    {


        $validation = new UserValidator();

        $validator = $validation->userUpdateValidation($request, $id);


        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $user = User::find($id);
        $user->initials = $request->initials;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();


        $user->roles()->updateExistingPivot($user->role_id(), ['role_id' => $request->role_id]);

        return response()->json([
            'success' => true,
            'message' => 'Updated Successfully.'
        ]);
    }



    /*#####################################################
    #------------------------------------------------------
    # Function updatePassword
    #-------------------------------------------------------
    #
    # @_SM: 
    #
    #
    #
    #
    #####################################################*/

    public function updatePassword(Request $request)
    {

        $validation = new PasswordValidator();

        $validator = $validation->passwordValidation($request, auth()->user()->id);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return response()->json([
            'success' => true,
            'message' => 'Password Updated Successfully.'
        ]);
    }

    public function updateUserPassword(Request $request, $id)
    {

        $validation = new PasswordValidator();

        $validator = $validation->userPasswordValidation($request);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        User::find($id)->update(['password' => Hash::make($request->new_password)]);

        return response()->json([
            'success' => true,
            'message' => 'Password Updated Successfully.'
        ]);
    }
    /*#####################################################
    #------------------------------------------------------
    # Function destroy
    #-------------------------------------------------------
    #
    # @_SM: 
    # Parameters : user_id
    #
    #
    #
    #####################################################*/
    public function destroy(Request $request, $id)
    {
        $user = User::findorfail($id);
        $user->delete();
        DB::table('role_user')->where('user_id', '=', $id)->delete();
        return redirect('/admin/users')->with('success', 'The user has been deleted successfully.');
    }
}
