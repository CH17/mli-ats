<?php

namespace App\Http\Controllers;

use App\MocPractice;
use App\Formatter\MocPracticeFormatter;
use App\MocBoard;
use App\Validator\MocPracticeValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MocPracticeController extends Controller
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
            $moc_practice = MocPractice::find($item_id);
            $moc_practice->order = $counter;
            $moc_practice->save();
        }

        $moc_boards = MocBoard::pluck('board', 'id');

        $data['moc_boards'] = $moc_boards;

        $data['user_role'] = Auth::user()->role();

        $moc_practices = MocPractice::orderBy('order', 'ASC')->paginate(15);

        $data['moc_practices'] = $moc_practices;

        return view('backend.moc-practice.index', $data);
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
        $validation = new MocPracticeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $moc_practice_data = new MocPracticeFormatter();
        $data = $moc_practice_data->format($request);

        MocPractice::create($data);

        return redirect('/admin/moc-practices')->with('success', 'Moc Practice created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MocPractice  $mocPractice
     * @return \Illuminate\Http\Response
     */
    public function show(MocPractice $mocPractice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MocPractice  $mocPractice
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MocPractice $moc_practice)
    {

        $counter = $request->counter;
        $item_id = $request->item_id;

        if (!empty($counter) && !empty($item_id)) {
            $moc_practice = MocPractice::find($item_id);
            $moc_practice->order = $counter;
            $moc_practice->save();
        }

        $moc_boards = MocBoard::pluck('board', 'id');

        $data['moc_boards'] = $moc_boards;

        $data['moc_practice'] = $moc_practice;

        $data['user_role'] = Auth::user()->role();

        $moc_practices = MocPractice::orderBy('order', 'ASC')->paginate(15);

        $data['moc_practices'] = $moc_practices;

        return view('backend.moc-practice.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MocPractice  $mocPractice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MocPractice $moc_practice)
    {
        $validation = new MocPracticeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $moc_practice_data = new MocPracticeFormatter();
        $data = $moc_practice_data->format($request);

        $moc_practice->update($data);

        return redirect()->back()->with('success', 'Moc Practice updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MocPractice  $mocPractice
     * @return \Illuminate\Http\Response
     */
    public function destroy(MocPractice $moc_practice)
    {
        $moc_practice->delete();

        return redirect('/admin/moc-practices')->with('success', 'Moc Practice has been deleted successfully!');
    }
}
