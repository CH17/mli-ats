<?php

namespace App\Http\Controllers;

use App\EpContact;
use App\EducationalPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EpContactController extends Controller
{
    public function index()
    {
        $data['user_role'] = Auth::user()->role();

        $epContacts = EpContact::with('educational_partner')->paginate(15);

        $data['epContacts'] = $epContacts;

        $educationalPartners = EducationalPartner::pluck('name', 'id');

        $data['educationalPartners'] = $educationalPartners;

        return view('backend.ep-contact.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ep_id'                             => 'required',
            'contact_name'                      => 'required|max:255',
            'contact_email'                     => 'required|email',
        ]);

        EpContact::create([
            'ep_id'            => $request->ep_id,
            'contact_name'     => $request->contact_name,
            'contact_email'    => $request->contact_email,
            'telephone1'       => $request->telephone1,
            'telephone2'       => $request->telephone2,
        ]);

        return redirect()->back()->with('success', 'Educational Partner Contact created successfully!');
    }

    public function edit(EpContact $educational_partner_contact)
    {
        $educationalPartners = EducationalPartner::pluck('name', 'id');

        $data['educationalPartners'] = $educationalPartners;

        $data['epContact'] = $educational_partner_contact;

        $data['user_role'] = Auth::user()->role();

        $epContacts = EpContact::with('educational_partner')->paginate(15);

        $data['epContacts'] = $epContacts;

        return view('backend.ep-contact.edit', $data);
    }

    public function update(Request $request, EpContact $educational_partner_contact)
    {
        $request->validate([
            'ep_id'                             => 'required',
            'contact_name'                      => 'required|max:255',
            'contact_email'                     => 'required|email',
        ]);

        $educational_partner_contact->update([
            'ep_id'            => $request->ep_id,
            'contact_name'     => $request->contact_name,
            'contact_email'    => $request->contact_email,
            'telephone1'       => $request->telephone1,
            'telephone2'       => $request->telephone2,
        ]);

        return redirect()->back()->with('success', 'Educational Partner Contact Updated Successfully!');
    }

    public function destroy($id)
    {
        $epContact = EpContact::findOrFail($id);
        $epContact->delete();

        return redirect('/admin/educational-partner-contacts')->with('success', 'Educational Partner Contact has been deleted successfully!');
    }
}
