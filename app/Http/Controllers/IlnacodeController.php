<?php

namespace App\Http\Controllers;

use App\Formatter\IlnacodeFormatter;
use App\IlnaCode;
use App\Formatter\MocBoardFormatter;
use App\Validator\IlnacodeValidator;
use App\Validator\MocBoardValidator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class IlnacodeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $data['user_role'] = Auth::user()->role();

        $ilna_codes = IlnaCode::orderBy('order', 'ASC')->paginate(15);

        $data['ilna_codes'] = $ilna_codes;

        return view('backend.ilna-coding.index', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validation = new IlnacodeValidator();
        $validator = $validation->validate($request);

        if ($validator->fails()) {

            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $ilna_data = new IlnacodeFormatter();
        $data = $ilna_data->format($request);

        Ilnacode::create($data);

        return redirect('/admin/ilna-codes')->with('success', 'ILNA Code created successfully!');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ilnacode  $ilna_code
     * @return \Illuminate\Http\Response
     */
    public function edit(IlnaCode $ilna_code)
    {

        $data['user_role'] = Auth::user()->role();
        $ilna_codes = IlnaCode::orderBy('order', 'ASC')->paginate(15);

        $data['ilna_codes'] = $ilna_codes;

        $data['ilna_code'] = $ilna_code;

       

        return view('backend.ilna-coding.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ilnacode  $ilna_code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IlnaCode $ilna_code)
    {
        
        $validation = new IlnacodeValidator();
        $validator = $validation->validate($request);

        if ($validator->fails()) {

            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $ilna_data = new IlnacodeFormatter();
        $data = $ilna_data->format($request);
        

        $ilna_code->update($data);

        return redirect()->back()->with('success', 'Ilna Code updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IlnaCode $ilna_code
     * @return \Illuminate\Http\Response
     */
    public function destroy(IlnaCode $ilna_code)
    {
         $ilna_code->delete();

         return redirect('/admin/ilna-codes')->with('success', 'Ilna Code has been deleted successfully!');
    }
}
