<?php

namespace App\Http\Controllers;

use App\MocBoard;
use App\Formatter\MocBoardFormatter;
use App\Validator\MocBoardValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MocBoardController extends Controller
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
            $moc_board = MocBoard::find($item_id);
            $moc_board->order = $counter;
            $moc_board->save();
        }

        $data['user_role'] = Auth::user()->role();

        $moc_boards = MocBoard::orderBy('order', 'ASC')->paginate(15);

        $data['moc_boards'] = $moc_boards;

        return view('backend.moc-board.index', $data);
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
        $validation = new MocBoardValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $moc_data = new MocBoardFormatter();
        $data = $moc_data->format($request);

        MocBoard::create($data);

        return redirect('/admin/moc-boards')->with('success', 'Moc Board created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MocBoard  $mocBoard
     * @return \Illuminate\Http\Response
     */
    public function show(MocBoard $mocBoard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MocBoard  $mocBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MocBoard $moc_board)
    {
        $counter = $request->counter;
        $item_id = $request->item_id;

        if (!empty($counter) && !empty($item_id)) {
            $moc_board = MocBoard::find($item_id);

            
            $moc_board->order = $counter;
            $moc_board->save();
        }
       
        $data['user_role'] = Auth::user()->role();

        $moc_boards = MocBoard::orderBy('order', 'ASC')->paginate(15);

        $data['moc_boards'] = $moc_boards;

        $data['moc_board'] = $moc_board;

        return view('backend.moc-board.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MocBoard  $mocBoard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MocBoard $moc_board)
    {
        $validation = new MocBoardValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $moc_data = new MocBoardFormatter();
        $data = $moc_data->format($request);

        $moc_board->update($data);

        return redirect()->back()->with('success', 'Moc Board updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MocBoard  $mocBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(MocBoard $moc_board)
    {
        $moc_board->delete();

        return redirect('/admin/moc-boards')->with('success', 'Moc Board has been deleted successfully!');
    }
}
