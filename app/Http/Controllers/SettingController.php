<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting= Setting::First();
        return view('admin.setting.index',compact('setting'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate( [
            'site_name'=>'required',
            'logo'=>'mimes:jpeg,jpg,png',
            'footer_info'=>'required',
        ]);
        $setting->site_name = $request->site_name;
        $setting->description = $request->description;
        $setting->email = $request->email;
        $setting->mobile = $request->mobile;
        $setting->fb_url = $request->fb_url;
        $setting->tw_url = $request->tw_url;
        $setting->ig_url = $request->ig_url;
        $setting->rh_url = $request->rh_url;
        $setting->footer_info = $request->footer_info;

        if($request->hasFile('logo')){
            if(File::exists($setting->logo)){
                File::delete($setting->logo);
            }
            $logo = $request->logo;
            $logo_name = time().".".$logo->getClientOriginalExtension();
            $logo->move('storage/setting/', $logo_name);
            $setting->logo = 'storage/setting/'.$logo_name;
        }
        $setting->save();

        return redirect()->back()->with('success','Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
