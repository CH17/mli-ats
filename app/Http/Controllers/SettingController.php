<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Validator\DueDayValidator;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = new Setting();
        $due_days = $setting->getSetting('due_days');
        $data['due_days'] = $due_days;

        $business_days = config('constants.business_days');
        $data['business_days'] = $business_days;

        return view('backend/setting/index', $data);
    }

    public function store(Request $request)
    {  
        $validation = new DueDayValidator();
        $validator = $validation->validate($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $due_days = [
            "key" => "due_days",
            "value" => $request->due_days,
        ];

        $data['due_days'] = $due_days;

        $setting = new Setting();
        $setting->setSetting($data);

        return redirect()->back()->with('success', ' General Settings updated successfully!');
    }
}
