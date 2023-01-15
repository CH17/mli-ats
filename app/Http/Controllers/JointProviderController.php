<?php

namespace App\Http\Controllers;

use App\JointProvider;
use App\Formatter\JointProviderFormatter;
use App\Validator\JointProviderValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JointProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user_role'] = Auth::user()->role();

        $jointProviders = JointProvider::paginate(15);

        $data['jointProviders'] = $jointProviders;

        return view('backend.joint-provider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = new JointProviderValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $jp_data = new JointProviderFormatter();
        $data = $jp_data->format($request);

        JointProvider::create($data);

        return redirect()->back()->with('success', 'Joint Provider created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JointProvider  $jointProvider
     * @return \Illuminate\Http\Response
     */
    public function show(JointProvider $jointProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JointProvider  $jointProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(JointProvider $jointProvider)
    {
        $data['user_role'] = Auth::user()->role();

        $jointProviders = JointProvider::paginate(15);

        $data['jointProviders'] = $jointProviders;

        $data['jointProvider'] = $jointProvider;

        return view('backend.joint-provider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JointProvider  $jointProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JointProvider $jointProvider)
    {
        $validation = new JointProviderValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $jp_data = new JointProviderFormatter();
        $data = $jp_data->format($request);

        $jointProvider->update($data);

        return redirect()->back()->with('success', 'Joint Provider Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JointProvider  $jointProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jointProvider = JointProvider::findOrFail($id);
        $jointProvider->delete();

        return redirect('/admin/joint-providers')->with('success', 'Joint Provider has been deleted successfully!');
    }
}
