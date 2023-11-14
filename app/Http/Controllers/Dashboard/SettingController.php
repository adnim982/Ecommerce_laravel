<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Utils\ImageUpload;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
    
        if (!$setting) {
            // Handle the case where the setting with the given $id was not found, e.g., redirect to a 404 page or show an error message.
            return abort(404);
        }
    
        return view('dashboard.settings.edit', compact('setting'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update settings
        $validation = $request->validate([
            'title' =>'required',
            'description' =>'required',
            'adresse' =>'required',
            'phone' =>'required',
            'email' =>'required',
            'logo' =>'required',
            'favicon' =>'required',
            'facebook' =>'required',
        ]);
        $title = $request->title;
        $logo = ImageUpload::upload($request, $request->logo , 'logo');
        $favicon = ImageUpload::upload($request, $request->favicon , 'favicon');
        $setting = Setting::find($id);
        $setting->title = $title;
        $setting->description = $request->description;
        $setting->adresse = $request->adresse;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->logo = $logo;
        $setting->favicon = $favicon;
        $setting->facebook = $request->facebook;
        $setting->save();

        return redirect()->route('settings.edit', $setting->id)->with('succes', 'All Inputs Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
