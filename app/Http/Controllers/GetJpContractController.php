<?php

namespace App\Http\Controllers;

use App\JpContact;
use App\Project;
use Illuminate\Http\Request;
use View;

class GetJpContractController extends Controller
{
    public function create(Request $request)
    {
        $jp_id = $request->jp_id;

        $jp_contacts = JpContact::where('jp_id', $jp_id)->get();

        $data['jp_contacts'] =  $jp_contacts;

        $jp_contacts_view = View::make('frontend.template.jp-contacts', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp_contacts_view' => $jp_contacts_view,
        ));
    }

    public function create2(Request $request)
    {
        $jp_id_2 = $request->jp_id_2;

        $jp2_contacts = JpContact::where('jp_id', $jp_id_2)->get();

        $data['jp2_contacts'] =  $jp2_contacts;

        $jp2_contacts_view = View::make('frontend.template.jp-contacts-2', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp2_contacts_view' => $jp2_contacts_view,
        ));
    }


    public function create3(Request $request)
    {
        $jp_id_3 = $request->jp_id_3;

        $jp3_contacts = JpContact::where('jp_id', $jp_id_3)->get();

        $data['jp3_contacts'] =  $jp3_contacts;

        $jp3_contacts_view = View::make('frontend.template.jp-contacts-3', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp3_contacts_view' => $jp3_contacts_view,
        ));
    }

    public function edit(Request $request)
    {
        $project_id = $request->project_id;

        $project = Project::findOrFail($project_id);

        $data['project'] =  $project;

        $jp_id = $request->jp_id;

        $jp_contacts = JpContact::where('jp_id', $jp_id)->get();

        $data['jp_contacts'] =  $jp_contacts;

        $jp_contacts_view = View::make('backend/project/template/edit-template/jp-contacts', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp_contacts_view' => $jp_contacts_view,
        ));
    }

    public function edit2(Request $request)
    {
        $project_id = $request->project_id;

        $project = Project::findOrFail($project_id);

        $data['project'] =  $project;

        $jp_id_2 = $request->jp_id_2;

        $jp2_contacts = JpContact::where('jp_id', $jp_id_2)->get();

        $data['jp2_contacts'] =  $jp2_contacts;

        $jp2_contacts_view = View::make('backend/project/template/edit-template/jp-contacts-2', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp2_contacts_view' => $jp2_contacts_view,
        ));
    }


    public function edit3(Request $request)
    {
        $project_id = $request->project_id;

        $project = Project::findOrFail($project_id);

        $data['project'] =  $project;

        $jp_id_3 = $request->jp_id_3;

        $jp3_contacts = JpContact::where('jp_id', $jp_id_3)->get();

        $data['jp3_contacts'] =  $jp3_contacts;

        $jp3_contacts_view = View::make('backend/project/template/edit-template/jp-contacts-3', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp3_contacts_view' => $jp3_contacts_view,
        ));
    }
}
