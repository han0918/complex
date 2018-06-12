<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting',['setting'=>$setting]);
    }

    public function put(Request $request,Setting $setting)
    {
        $setting->name = $request->name;
        $setting->left = $request->left;
        $setting->lurl = $request->lurl;
        $setting->center = $request->center;
        $setting->curl = $request->curl;
        $setting->right = $request->right;
        $setting->rurl = $request->rurl;
        $setting->copyright = $request->copyright;
        if($setting->save()){
            return show_res(1,'更新成功',route('setting.index'));
        }else{
            return show_res(0,'更新失败');
        }

    }

}
