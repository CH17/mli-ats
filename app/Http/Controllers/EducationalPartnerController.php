<?php

namespace App\Http\Controllers;

use App\EducationalPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationalPartnerController extends Controller
{
    public function index()
    {
        $data['user_role'] = Auth::user()->role();

        $educational_partners = EducationalPartner::paginate(15);

        $data['educational_partners'] = $educational_partners;

        return view('backend.educational-partner.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                => 'required|max:255',
            'ep_code'             => 'required|max:255',
            'address1'            => 'required|max:255',
            'city'                => 'required|max:255',
        ]);

        EducationalPartner::create([
            'name'                 => $request->name,
            'ep_code'              => $request->ep_code,
            'address1'             => $request->address1,
            'address2'             => $request->address2,
            'city'                 => $request->city,
            'state'                => $request->state,
            'zip'                  => $request->zip,
        ]);

        return redirect()->back()->with('success', 'Educational partner created successfully!');
    }

    public function edit(EducationalPartner $educationalPartner)
    {
        $data['user_role'] = Auth::user()->role();

        $educationalPartners = EducationalPartner::paginate(15);

        $data['educationalPartners'] = $educationalPartners;

        $data['educationalPartner'] = $educationalPartner;

        return view('backend.educational-partner.edit', $data);
    }


    public function update(Request $request, EducationalPartner $educationalPartner)
    {
        $request->validate([
            'name'                => 'required|max:255',
            'ep_code'             => 'required|max:255',
            'address1'            => 'required|max:255',
            'city'                => 'required|max:255',
        ]);

        $educationalPartner->update([
            'name'                 => $request->name,
            'ep_code'              => $request->ep_code,
            'address1'             => $request->address1,
            'address2'             => $request->address2,
            'city'                 => $request->city,
            'state'                => $request->state,
            'zip'                  => $request->zip,
        ]);

        return redirect()->back()->with('success', 'Educational partner updated successfully!');
    }

    public function destroy($id)
    {
        $educationalPartner = EducationalPartner::findOrFail($id);
        $educationalPartner->delete();

        return redirect('/admin/educational-partners')->with('success', 'Educational Partner has been deleted successfully!');
    }
}
