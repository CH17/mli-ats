<?php

namespace App\Http\Controllers;

use App\MliFee;
use App\Project;
use App\Formatter\MliFeeFormatter;
use App\Validator\MliFeeValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MliFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user_role'] = Auth::user()->role();

        $mli_fees = MliFee::paginate(15);

        $data['mli_fees'] = $mli_fees;

        $projects = Project::pluck('activity_id', 'id');

        $data['projects'] = $projects;

        return view('backend.mli-fee.index', $data);
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
        $validation = new MliFeeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mli_fee_data = new MliFeeFormatter();
        $data = $mli_fee_data->format($request);

        MliFee::create($data);

        return redirect()->back()->with('success', 'Mli Fee created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MliFee  $mliFee
     * @return \Illuminate\Http\Response
     */
    public function show(MliFee $mliFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MliFee  $mliFee
     * @return \Illuminate\Http\Response
     */
    public function edit(MliFee $mli_fee)
    {
        $projects = Project::pluck('activity_id', 'id');

        $data['projects'] = $projects;

        $data['mli_fee'] = $mli_fee;

        $data['user_role'] = Auth::user()->role();

        $mli_fees = MliFee::paginate(15);

        $data['mli_fees'] = $mli_fees;

        return view('backend.mli-fee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MliFee  $mliFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MliFee $mli_fee)
    {
        $validation = new MliFeeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mli_fee_data = new MliFeeFormatter();
        $data = $mli_fee_data->format($request);

        $mli_fee->update($data);

        return redirect()->back()->with('success', 'Mli Fee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MliFee  $mliFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(MliFee $mli_fee)
    {
        $mli_fee->delete();

        return redirect('/admin/mli-fees')->with('success', 'Mli Fee has been deleted successfully!');
    }
}
