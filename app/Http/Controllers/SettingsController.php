<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }
    public function store(Request $request)
    {
        foreach (array_except($request->toArray(), ['_token', 'submit']) as $key => $value) {
           
            $settings = Setting::where('name', $key)->first();
           
            if($settings->type != 3){
          
                $settings->fill(['value'=>$value])->save();
            
            }else{
                $filename = uploadimage($value, '/public/one/images/', '1600', '500', $settings->value);

                if($filename){
                    $settings->fill(['value'=>$filename])->save();
                }else{
                    return Redirect::back()->withFlashMessage('Error : Uploading Failed !!');
                }
           }
        }
        return redirect('admin-panal/settings')->withFlashMessage('Done Operation !!');
    }
}
