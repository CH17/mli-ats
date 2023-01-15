<?php

namespace App\Http\Controllers;

use App\AudienceType;
use App\Formatter\AudienceTypeFormatter;
use Illuminate\Http\Request;
use App\Validator\AudienceTypeValidator;
use Illuminate\Support\Facades\Auth;

class AudienceTypeController extends Controller
{


    public function index(Request $request)
    {
        $counter = $request->counter;
        $item_id = $request->item_id;

        if (!empty($counter) && !empty($item_id)) {
            $audience = AudienceType::find($item_id);
            $audience->order = $counter;
            $audience->save();
        }

        $data['user_role'] = Auth::user()->role();

        $audiences = AudienceType::orderBy('order', 'ASC')->paginate(15);

        $data['audiences'] = $audiences;

        return view('backend.audience-type.index', $data);
    }



    public function create()
    {
        //
    }



    public function store(Request $request)
    {


        $validation = new AudienceTypeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $audience_data = new AudienceTypeFormatter();
        $data = $audience_data->format($request);

        AudienceType::create($data);

        return redirect()->back()->with('success', 'Audience created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AudienceType  $audienceType
     * @return \Illuminate\Http\Response
     */
    public function show(AudienceType $audienceType)
    {
        //
    }


    public function edit(Request $request, AudienceType $audienceType)
    {
        $counter = $request->counter;
        $item_id = $request->item_id;

        if (!empty($counter) && !empty($item_id)) {
            $audience = AudienceType::find($item_id);
            $audience->order = $counter;
            $audience->save();
        }

        $data['user_role'] = Auth::user()->role();

        $audiences = AudienceType::orderBy('order', 'ASC')->paginate(15);

        $data['audiences'] = $audiences;

        $data['audienceType'] = $audienceType;

        return view('backend.audience-type.edit', $data);
    }


    public function update(Request $request, AudienceType $audienceType)
    {


        $validation = new AudienceTypeValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $audience_data = new AudienceTypeFormatter();
        $data = $audience_data->format($request);

        $audienceType->update($data);

        return redirect()->back()->with('success', 'Audience Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AudienceType  $audienceType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audienceType = AudienceType::findOrFail($id);
        $audienceType->delete();

        return redirect('/admin/audience-types')->with('success', 'The Audience has been deleted successfully!');
    }
}
