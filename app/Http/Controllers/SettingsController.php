<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $data = Settings::first();
        return view('admin.settings.settings',compact('data'));
    }
    public function update(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|min:10|max:11',
            'email'=>'required|email',
        ]);

        $data = Settings::first();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->save();
        return redirect()->back()->with('success','Settings Updates SUccessfully');
    }
}
