<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function privacy()
    {
        $data = Setting::where('name', 'privacy')->first();
        return view('admin.privacy', compact('data'));
    }
    public function ourpractice()
    {
        $data = Setting::where('name', 'ourpractice')->first();
        return view('admin.ourpractice', compact('data'));
    }
    public function terms()
    {
        $data = Setting::where('name', 'terms')->first();
        return view('admin.terms', compact('data'));
    }
    public function privacyOP(Request $request)
    {
        if ($request->id == null) {

            $newdata = new Setting();
            $newdata->name = 'privacy';
            $newdata->value = $request->description;
            $newdata->save();
        } else {
            $data = Setting::find($request->id);
            $data->value = $request->description;
            $data->save();
        }

        return response()->json(['success' => 'Privacy updated successfully']);
    }
    public function termsOP(Request $request)
    {
        if ($request->id == null) {

            $newdata = new Setting();
            $newdata->name = 'terms';
            $newdata->value = $request->description;
            $newdata->save();
        } else {
            $data = Setting::find($request->id);
            $data->value = $request->description;
            $data->save();
        }

        return response()->json(['success' => 'Terms updated successfully']);
    }
    public function ourpracticeOP(Request $request)
    {
        if ($request->id == null) {

            $newdata = new Setting();
            $newdata->name = 'ourpractice';
            $newdata->value = $request->description;
            $newdata->save();
        } else {
            $data = Setting::find($request->id);
            $data->value = $request->description;
            $data->save();
        }

        return response()->json(['success' => 'Our Practice updated successfully']);
    }
}
