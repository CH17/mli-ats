<?php

namespace App\Http\Controllers;

use App\CreditType;
use App\Project;
use Illuminate\Http\Request;

class AccreditationTypeController extends Controller
{
    public function index(Request $request)
    {

        $credit_type_id = $request->credit_type_id;

        $credit_type = CreditType::find($credit_type_id);

        $data['credit_type'] =  $credit_type;

        $criteria_list = config('constants.criteria');

        $data['criteria_list'] = $criteria_list;

        $accreditation_type_view = view('frontend.template.accreditation-type', $data)->render();

        $level_text_view = view('frontend.template.level-text', $data)->render();

        $pharmacology_amount_view = view('frontend.template.pharmacology-amount', $data)->render();

        $criteria_view = view('frontend.template.criteria', $data)->render();

        return response()->json(array(
            'success' => true,
            'accreditation_type_view' => $accreditation_type_view,
            'level_text_view' => $level_text_view,
            'pharmacology_amount_view' => $pharmacology_amount_view,
            'criteria_view' => $criteria_view,
        ));
    }

    public function edit(Request $request)
    {

        $project_id = $request->project_id;

        $project = Project::find($project_id);

        $data['project'] =  $project;

        $credit_type_id = $request->credit_type_id;

        $credit_type = CreditType::find($credit_type_id);

        $data['credit_type'] =  $credit_type;

        $criteria_list = config('constants.criteria');

        $data['criteria_list'] = $criteria_list;

        $accreditation_type_view = view('backend/project/template/edit-template/accreditation-type', $data)->render();

        $level_text_view = view('backend/project/template/edit-template/level-text', $data)->render();

        $pharmacology_amount_view = view('backend/project/template/edit-template/pharmacology-amount', $data)->render();

        $criteria_view = view('backend/project/template/edit-template/criteria', $data)->render();

        return response()->json(array(
            'success' => true,
            'accreditation_type_view' => $accreditation_type_view,
            'level_text_view' => $level_text_view,
            'pharmacology_amount_view' => $pharmacology_amount_view,
            'criteria_view' => $criteria_view,
        ));
    }
}
