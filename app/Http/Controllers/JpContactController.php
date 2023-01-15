<?php

namespace App\Http\Controllers;

use App\JpContact;
use App\Formatter\JpContactFormatter;
use App\JointProvider;
use App\Validator\JpContactValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JpContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user_role'] = Auth::user()->role();

        $jpContacts = JpContact::with('joint_provider')->paginate(15);

        $data['jpContacts'] = $jpContacts;

        $jointProviders = JointProvider::pluck('name', 'id');

        $data['jointProviders'] = $jointProviders;

        return view('backend.jp-contact.index', $data);
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
        $validation = new JpContactValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $jpc_data = new JpContactFormatter();
        $data = $jpc_data->format($request);

        JpContact::create($data);

        return redirect()->back()->with('success', 'Joint Provider Contact created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JpContact  $jpContact
     * @return \Illuminate\Http\Response
     */
    public function show(JpContact $jpContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JpContact  $jpContact
     * @return \Illuminate\Http\Response
     */
    public function edit(JpContact $joint_provider_contact)
    {
        $jointProviders = JointProvider::pluck('name', 'id');

        $data['jointProviders'] = $jointProviders;

        $data['jpContact'] = $joint_provider_contact;

        $data['user_role'] = Auth::user()->role();

        $jpContacts = JpContact::with('joint_provider')->paginate(15);

        $data['jpContacts'] = $jpContacts;

        return view('backend.jp-contact.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JpContact  $jpContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JpContact $joint_provider_contact)
    {
        $validation = new JpContactValidator();
        $validator = $validation->step1validation($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $jpc_data = new JpContactFormatter();
        $data = $jpc_data->format($request);

        $joint_provider_contact->update($data);

        return redirect()->back()->with('success', 'Joint Provider Contact Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JpContact  $jpContact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jpContact = JpContact::findOrFail($id);
        $jpContact->delete();

        return redirect('/admin/joint-provider-contacts')->with('success', 'Joint Provider Contact has been deleted successfully!');
    }
}
