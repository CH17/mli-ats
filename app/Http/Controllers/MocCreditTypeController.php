<?php

namespace App\Http\Controllers;

use App\MocCreditType;
use App\Formatter\MocCreditTypeFormatter;
use App\MocBoard;
use App\Validator\MocCreditTypeValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MocCreditTypeController extends Controller
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
            $moc_credit_type = MocCreditType::find($item_id);
            $moc_credit_type->order = $counter;
            $moc_credit_type->save();
        }

        $data['user_role'] = Auth::user()->role();

        $moc_credit_types = MocCreditType::orderBy('order', 'ASC')->paginate(15);

        $data['moc_credit_types'] = $moc_credit_types;

        $moc_boards = MocBoard::pluck('board', 'id');

        $data['moc_boards'] = $moc_boards;

        return view('backend.moc-credit-type.index', $data);
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
        $validation = new MocCreditTypeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $moc_credit_data = new MocCreditTypeFormatter();
        $data = $moc_credit_data->format($request);

        MocCreditType::create($data);

        return redirect('/admin/moc-credit-types')->with('success', 'Moc Credit Type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MocCreditType  $mocCreditType
     * @return \Illuminate\Http\Response
     */
    public function show(MocCreditType $mocCreditType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MocCreditType  $mocCreditType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MocCreditType $moc_credit_type)
    {
        $counter = $request->counter;
        $item_id = $request->item_id;

        if (!empty($counter) && !empty($item_id)) {
            $moc_credit_type = MocCreditType::find($item_id);
            $moc_credit_type->order = $counter;
            $moc_credit_type->save();
        }

        $data['user_role'] = Auth::user()->role();

        $moc_credit_types = MocCreditType::orderBy('order', 'ASC')->paginate(15);

        $data['moc_credit_types'] = $moc_credit_types;

        $moc_boards = MocBoard::pluck('board', 'id');

        $data['moc_boards'] = $moc_boards;

        $data['moc_credit_type'] = $moc_credit_type;

        return view('backend.moc-credit-type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MocCreditType  $mocCreditType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MocCreditType $moc_credit_type)
    {
        $validation = new MocCreditTypeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $moc_credit_data = new MocCreditTypeFormatter();
        $data = $moc_credit_data->format($request);

        $moc_credit_type->update($data);

        return redirect()->back()->with('success', 'Moc Credit Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MocCreditType  $mocCreditType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MocCreditType $moc_credit_type)
    {
        $moc_credit_type->delete();

        return redirect('/admin/moc-credit-types')->with('success', 'Moc Credit Type has been deleted successfully!');
    }
}
