<?php

namespace App\Http\Controllers;

use App\CreditType;
use App\Project;
use Illuminate\Http\Request;

class AccreditationTypeNonMLIController extends Controller
{
    public function index(Request $request)
    {     

        $credit_type_id = $request->credit_type_id;

        $credit_type = CreditType::find($credit_type_id);

        $data['credit_type'] =  $credit_type;  
        
        $criteria_list = config('constants.criteria');

        $data['criteria_list'] = $criteria_list;

        $accreditation_type_non_mli_view = view('frontend.template.accreditation-type-non-mli', $data)->render();

        $level_text_non_mli_view = view('frontend.template.level-text-non-mli', $data)->render();

        $pharmacology_amount_non_mli_view = view('frontend.template.pharmacology-amount-non-mli', $data)->render();
        
        $criteria__non_mli_view = view('frontend.template.criteria-non-mli', $data)->render();

        return response()->json(array(
            'success' => true,
            'accreditation_type_non_mli_view' => $accreditation_type_non_mli_view,
            'level_text_non_mli_view' => $level_text_non_mli_view,
            'pharmacology_amount_non_mli_view' => $pharmacology_amount_non_mli_view,
            'criteria__non_mli_view' => $criteria__non_mli_view,
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

        $accreditation_type_non_mli_view = view('backend/project/template/edit-template/accreditation-type-non-mli', $data)->render();

        $level_text_non_mli_view = view('backend/project/template/edit-template/level-text-non-mli', $data)->render();

        $pharmacology_amount_non_mli_view = view('backend/project/template/edit-template/pharmacology-amount-non-mli', $data)->render();
        
        $criteria_non_mli_view = view('backend/project/template/edit-template/criteria-non-mli', $data)->render();

        $accreditor_non_mli_view = view('backend/project/template/edit-template/accreditor-non-mli', $data)->render();

        return response()->json(array(
            'success' => true,
            'accreditation_type_non_mli_view' => $accreditation_type_non_mli_view,
            'level_text_non_mli_view' => $level_text_non_mli_view,
            'pharmacology_amount_non_mli_view' => $pharmacology_amount_non_mli_view,
            'criteria_non_mli_view' => $criteria_non_mli_view,
            'accreditor_non_mli_view' => $accreditor_non_mli_view,
        ));
    } 
}
