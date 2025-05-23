<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

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
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/ourpractice');
                $newdata->image = 'public/ourpractice/' . basename($imagePath);
            }
            $newdata->save();
        } else {
            $data = Setting::find($request->id);
            $data->value = $request->description;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/ourpractice');
                $data->image = 'public/ourpractice/' . basename($imagePath);
            }
            $data->save();
        }

        return response()->json(['success' => 'Our Practice updated successfully']);
    }

    public function insuranceinfo()
    {
        $data = Setting::where('name', 'insuranceinfo')->first();
        return view('admin.insuranceinfo', compact('data'));
    }

    public function insuranceinfoOP(Request $request)
    {
        if ($request->id == null) {

            $newdata = new Setting();
            $newdata->name = 'insuranceinfo';
            $newdata->value = $request->description;
            $newdata->save();
        } else {
            $data = Setting::find($request->id);
            $data->value = $request->description;
            $data->save();
        }

        return response()->json(['success' => 'Insurance Info updated successfully']);
    }
    public function patientinfo()
    {
        $data = Setting::where('name', 'patientinfo')->first();
        return view('admin.patientinfo', compact('data'));
    }

    public function patientinfoOP(Request $request)
    {
        if ($request->id == null) {

            $newdata = new Setting();
            $newdata->name = 'patientinfo';
            $newdata->value = $request->description;
            $newdata->save();
        } else {
            $data = Setting::find($request->id);
            $data->value = $request->description;
            $data->save();
        }

        return response()->json(['success' => 'Patient Info updated successfully']);
    }
    public function directaccess()
    {
        $data = Setting::where('name', 'directaccess')->first();
        return view('admin.directaccess', compact('data'));
    }

    public function directaccessOP(Request $request)
    {
        if ($request->id == null) {

            $newdata = new Setting();
            $newdata->name = 'directaccess';
            $newdata->value = $request->description;
            $newdata->save();
        } else {
            $data = Setting::find($request->id);
            $data->value = $request->description;
            $data->save();
        }

        return response()->json(['success' => 'Direct Access updated successfully']);
    }


    public function mailsettings()
    {
        return view('admin.mailsettings');
    }

    public function updateMailSettings(Request $request)
    {
        try {
            $this->setEnvValue([
                'MAIL_FROM_ADDRESS' => $request->mail_from_address,
                'MAIL_TO' => $request->mail_to,
                'MAIL_FROM_NAME' => $request->mail_from_name,
            ]);

            Artisan::call('queue:restart');

            return response()->json(['message' => 'Mail settings updated successfully'], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }


    protected function setEnvValue(array $values)
    {
        $envFile = base_path('.env');
        $envLines = file($envFile);

        foreach ($values as $key => $newValue) {
            $keyFound = false;

            foreach ($envLines as &$line) {
                if (str_starts_with($line, $key . '=')) {
                    $line = $key . '="' . $newValue . '"' . PHP_EOL;
                    $keyFound = true;
                    break;
                }
            }

            if (!$keyFound) {
                $envLines[] = $key . '="' . $newValue . '"' . PHP_EOL;
            }
        }

        file_put_contents($envFile, implode('', $envLines));
    }

    public function configuration()
    {
        $data = Configuration::get();
        return view('admin.configuration', compact('data'));
    }

    public function configurationOP(Request $request)
    {
        $types = ['websitelogo1', 'websitelogo2', 'adminlogo'];

        foreach ($types as $type) {
            if ($request->hasFile($type)) {
                $file = $request->file($type);
                $imagePath = $file->store('public/configuration');
                $imagePath = 'public/configuration/' . basename($imagePath);

                $config = Configuration::where('type', $type)->first();

                if ($config) {
                    if ($config->image && Storage::exists($config->image)) {
                        Storage::delete($config->image);
                    }

                    $config->image = $imagePath;
                    $config->save();
                } else {
                    $config = new Configuration();             
                    $config->type = $type;
                    $config->image = $imagePath;
                    $config->save();
                }
            }
        }

        return response()->json(['success' => 'Configuration updated successfully']);
    }
}
