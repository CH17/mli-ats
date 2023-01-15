<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jac15Request;
use App\Jac15;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Jac15Controller extends Controller
{

    public function index()
    {
        $user_role = Auth::user()->role();

        $data['user_role'] = $user_role;

        $jac15s = Jac15::orderBy('add_date', 'desc')->paginate(15);

        $data['jac15s'] = $jac15s;

        return view('backend.jac15.index', $data);
    }


    public function create()
    {
        //
    }


    public function store(Jac15Request $request)
    {
        Jac15::create(array_merge(
            $request->all(),
            [
                'int_ext' => !empty($request->int_ext) ? implode(',', $request->int_ext) : null
            ]
        ));

        return redirect()->back()->with('success', 'Jac15 Added Successfully!');
    }


    public function show($id)
    {
        //
    }


    public function edit(Jac15 $jac15)
    {
        $user_role = Auth::user()->role();

        $data['user_role'] = $user_role;

        $jac15s = Jac15::orderBy('add_date', 'desc')->paginate(15);

        $data['jac15s'] = $jac15s;

        $data['jac15'] = $jac15;

        return view('backend.jac15.edit', $data);
    }


    public function update(Jac15Request $request, Jac15 $jac15)
    {
        $jac15->update(array_merge(
            $request->all(),
            [
                'int_ext' => !empty($request->int_ext) ? implode(',', $request->int_ext) : null
            ]
        ));

        return redirect()->back()->with('success', 'Jac15 Update Successfully!');
    }


    public function destroy(Jac15 $jac15)
    {
        $jac15->delete();

        return redirect()->route('jac15.index')->with('success', 'Jac15 Deleted Successfully!');
    }
}
