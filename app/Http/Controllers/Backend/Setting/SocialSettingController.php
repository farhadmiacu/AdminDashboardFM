<?php

namespace App\Http\Controllers\Backend\Setting;

use Illuminate\Http\Request;
use App\Models\SocialSetting;
use App\Http\Controllers\Controller;

class SocialSettingController extends Controller
{
    public function edit()
    {
        $setting = SocialSetting::first();
        return view('backend.layouts.settings.social_settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'telegram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        $setting = SocialSetting::first();
        if (!$setting) {
            $setting = new SocialSetting();
            $setting->id = 1;
        }

        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->tiktok = $request->tiktok;
        $setting->whatsapp = $request->whatsapp;
        $setting->linkedin = $request->linkedin;
        $setting->telegram = $request->telegram;
        $setting->youtube = $request->youtube;

        $setting->save();

        return redirect()->back()->with('success', 'Social settings updated successfully!');
    }
}
