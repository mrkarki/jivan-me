<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Session;

class SettingsController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = [];
        $users = Setting::all()
            ->pluck('meta_value', 'meta_key');
        //dd($users);
        //$data = $users->find(1);
        return view('admin.settings.index', compact('users'));
    }
    public function update(Request $request)
    {
        $newData = [];
        //$data = $request->all();
        $data = $this->prepareDataToUpdate($request);

        // check for new data and puss new data into 'newData' array veriable
        $settingDb = Setting::select('meta_key')->get()->toArray();
        $settingArray = array_column($settingDb, 'meta_key');

        foreach ($data as $key => $value) {
            if (!in_array($key, $settingArray)) {
                $newData[] = $key;
            }
        }

        foreach ($data as $key => $value) {
            $setting = Setting::where('meta_key', $key)->first();
            switch ($key) {

                case 'social_links':
                    if ($setting) {
                        $setting->meta_value = $this->prepareSocialLinks($value);
                        $setting->save();
                    }
                    break;
                default:
                    if ($setting) {
                        $setting->meta_value = $value;
                        $setting->save();
                    }
            }
        }

        if (isset($newData) && count($newData)) {
            foreach ($newData as $newDataKey => $nData) {
                $dataValue = $this->prepareNewDataToUpdate($request, $nData);
               //dd($nData);
                $SiteSetting = new Setting();
                $SiteSetting->meta_key = $nData;

                $SiteSetting->meta_title = str_replace('_', ' ', $nData);

                $SiteSetting->meta_value = $dataValue;

                $SiteSetting->save();
            }
        }

        //return view('admin.settings.index', compact('data'));
        $users = Setting::all()
                ->pluck('meta_value', 'meta_key');
        Session::flash('success', 'Record Updated successfully.');
        return view('admin.settings.index', compact('users'));

        //return view('admin.settings.index');
    }
    public function prepareNewDataToUpdate($request, $newData)
    {
        $data = $request->get('content');
        $datas = [];
        foreach ($data as $key => $value) {
            if ($key == $newData) {
                if (is_array($value)) {
                    //dd($value);
                    $datas[$key] = json_encode($value);
                } else {
                    $datas = $value;
                }
            }
        }
        return $datas;
    }
    public function prepareDataToUpdate($request)
    {
        $data = $request->get('content');
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = json_encode($value);
            }
        }

        return $data;
    }
}
