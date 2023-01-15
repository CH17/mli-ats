<?php

namespace App\Http\Controllers;

use App\MocBoard;
use App\MocCreditType;
use App\MocPractice;
use App\Project;
use Illuminate\Http\Request;
use View;

class GetMocController extends Controller
{
    public function index(Request $request)
    {
        $moc_board_id = $request->moc_board;

        $moc_board = MocBoard::find($moc_board_id);

        $data['moc_board'] =  $moc_board;

        $moc_credit_types = MocCreditType::where('moc_board_id', $moc_board_id)->get();

        $data['moc_credit_types'] =  $moc_credit_types;

        $moc_practices = MocPractice::where('moc_board_id', $moc_board_id)->get();

        $data['moc_practices'] =  $moc_practices;

        $moc_view = View::make('frontend.template.moc', $data)->render();

        return \Response::json(array(
            'success' => true,
            'moc_view' => $moc_view,
        ));
    }

    public function edit(Request $request)
    {
        $moc_board_id = $request->moc_board;

        $project_id = $request->project_id;

        $project = Project::find($project_id);

        $data['project'] =  $project;

        $mocBoard = MocBoard::find($moc_board_id);

        $data['mocBoard'] =  $mocBoard;

        $moc_credit_types = MocCreditType::where('moc_board_id', $moc_board_id)->get();

        $data['moc_credit_types'] =  $moc_credit_types;

        $moc_practices = MocPractice::where('moc_board_id', $moc_board_id)->get();

        $data['moc_practices'] =  $moc_practices;

        $moc_view = View::make('backend/project/template/edit-template/moc', $data)->render();

        return \Response::json(array(
            'success' => true,
            'moc_view' => $moc_view,
        ));
    }
}
