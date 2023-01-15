<?php

namespace App\Http\Controllers;

use App\CreditType;
use App\Formatter\CreditTypeFormatter;
use App\Validator\CreditTypeValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $counter = $request->counter;
        $item_id = $request->item_id;

        if (!empty($counter) && !empty($item_id)) {
            $credit_type = CreditType::find($item_id);
            $credit_type->order = $counter;
            $credit_type->save();
        }

        $data['user_role'] = Auth::user()->role();

        $credit_types = CreditType::orderBy('order', 'asc')->paginate(15);

        $data['credit_types'] = $credit_types;

        $criteria_list = config('constants.criteria');

        $data['criteria_list'] = $criteria_list;

        return view('backend.credit-type.index', $data);
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
        $validation = new CreditTypeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credit_data = new CreditTypeFormatter();
        $data = $credit_data->format($request);

        CreditType::create($data);

        return redirect()->back()->with('success', 'Credit Type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CreditType $creditType)
    {
        $counter = $request->counter;
        $item_id = $request->item_id;

        if (!empty($counter) && !empty($item_id)) {
            $credit_type = CreditType::find($item_id);
            $credit_type->order = $counter;
            $credit_type->save();
        }

        $data['user_role'] = Auth::user()->role();

        $credit_types = CreditType::orderBy('order', 'asc')->paginate(15);

        $data['credit_types'] = $credit_types;

        $data['creditType'] = $creditType;

        $criteria_list = config('constants.criteria');

        $data['criteria_list'] = $criteria_list;

        return view('backend.credit-type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditType $creditType)
    {
        $validation = new CreditTypeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credit_data = new CreditTypeFormatter();
        $data = $credit_data->format($request);

        $creditType->update($data);

        return redirect()->back()->with('success', 'Credit Type Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creditType = CreditType::findOrFail($id);
        $creditType->delete();

        return redirect('/admin/credit-types')->with('success', 'Credit Type has been deleted successfully!');
    }
}
