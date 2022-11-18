<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SocialLinks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::count();
        if ($settings == 1) {
            $settings = Setting::latest()->get();
            return response()->json([
                'success' => true,
                'settings' => $settings
            ]);
        } else {
            $settings = new Setting();
            $settings->facebook = " ";
            $settings->youtube = " ";
            $settings->official_website = " ";
            $settings->apps = " ";
            $settings->privacy_policies = " ";
            $settings->legal_policies = " ";
            $settings->save();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $settings = Setting::findOrFail($id);

            $settings->facebook = $request->facebook;
            $settings->youtube = $request->youtube;
            $settings->official_website = $request->official_website;
            $settings->apps = $request->apps;
            $settings->privacy_policies = $request->privacy_policies;
            $settings->legal_policies = $request->legal_policies;
            $result = $settings->save();
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Setting update Successfully',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Some problem',
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }


    public function showView()
    {
        $icons = SocialLinks::latest()->get();
        $privacy = Setting::first();
        return view('admin.setting', compact(['icons', 'privacy']));
    }

    public function storeLink(Request $request)
    {
        $links = new SocialLinks();
        $request->validate([
            'name' => 'required',
            'link' => 'required|url',
            'icon' => 'required|image|mimes:png,svg|max:2048'
        ]);
        $filename = "";
        if ($request->icon) {
            $filename = $request->icon->store('icon', 'public');
        }
        $links->name = $request->name;
        $links->link = $request->link;
        $links->icon = $filename;
        $result = $links->save();
        if ($result) {
            session()->flash('success', 'Add Successfully');
            $request->name = "";
            $request->link = "";
            $request->icon = "";
            return redirect('/settings');
        } else {
            session()->flash('success', 'Add Successfully');
        }
    }

    public function updateLinks(Request $request, $id)
    {

        $links = SocialLinks::findOrFail($id);
        $links->link = $request->link;
        $links->save();
        return redirect('/settings');
    }

    public function updatePrivcy(Request $request)
    {
        $settings = Setting::first();
        $settings->privacy_policies = $request->privacy_policies;
        $settings->legal_policies = $request->legal_policies;
        $result = $settings->save();
        if ($result) {
            return redirect('/settings');
        }
    }

    public function updatePassword()
    {
        $user_id = auth()->user()->id;
        $users = User::findOrFail($user_id);
        if (Hash::check($this->old_password, $users->password)) {
            if ($this->new_password != '' || $this->c_password != '') {
                if ($this->new_password  == $this->c_password) {
                    $users->password = Hash::make($this->new_password);
                    $result = $users->save();
                    if ($result) {
                        session()->flash('success', 'Password change successfullt');
                    } else {
                        session()->flash('error', 'Some problem');
                    }
                } else {
                    session()->flash('success', 'new password and confirm password is required');
                }
            } else {
                session()->flash('success', 'new password and confirm password is required');
            }
        } else {
            session()->flash('success', 'Invalid Password');
        }
    }
}
