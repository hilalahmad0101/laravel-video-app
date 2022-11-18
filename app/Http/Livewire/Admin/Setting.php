<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting as ModelsSetting;
use App\Models\SocialLinks;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Setting extends Component
{
    public $old_password,$new_password,$c_password;

    public $privacy_policies,$legal_policies;
    public $edit_id;

    public $facebook,$youtube,$official_website,$apps;

    public $edit_links;
    public $name,$link,$icon;

    public $check_links=[];

    use WithFileUploads;
    public function mount()
    {
        $settings=ModelsSetting::findOrFail(1);
        $this->edit_id=$settings->id;
        $this->privacy_policies=$settings->privacy_policies;
        $this->legal_policies=$settings->legal_policies;
        
        $this->facebook=$settings->facebook;
        $this->youtube=$settings->youtube;
        $this->official_website=$settings->official_website;
        $this->apps=$settings->apps;
    }

    public $icons;
    public function render()
    {
        $this->icons=SocialLinks::latest()->get();
        return view('livewire.admin.setting')->layout('layout.app');
    }


    public function changePassword()
    {
        $user_id = auth()->user()->id;
        $users = User::findOrFail($user_id);
        if (Hash::check($this->old_password, $users->password)) {
            if ($this->new_password != '' || $this->c_password != '') {
                if ($this->new_password  == $this->c_password) {
                    $users->password = Hash::make($this->new_password);
                    $result = $users->save();
                    if ($result) {
                        $this->dispatchBrowserEvent('alert', [
                            'type' => 'success',
                            'message' => "Password Update Successfully"
                        ]);
                    } else {
                        $this->dispatchBrowserEvent('alert', [
                            'type' => 'error',
                            'message' => "server problem"
                        ]);
                    }
                } else {
                    $this->dispatchBrowserEvent('alert', [
                        'type' => 'error',
                        'message' => "new password and confirm password are not matched"
                    ]);
                }
            } else {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "new password and confirm password is required"
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Invalid  password"
            ]);
        }
    }

    public function updatePrivcy()
    {
        $settings=ModelsSetting::findOrFail($this->edit_id);
        $settings->privacy_policies=$this->privacy_policies;
        $settings->legal_policies=$this->legal_policies;
        $result=$settings->save();
        if($result){
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Update Successfully"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server Error"
            ]);
        }
    }

    public function updateLinks()
    {
        $this->validate([
            'facebook'=>'url',
            'youtube'=>'url',
            'official_website'=>'url',
            'apps'=>'url',
        ]);
        $settings=ModelsSetting::findOrFail($this->edit_id);
        $settings->facebook=$this->facebook;
        $settings->youtube=$this->youtube;
        $settings->official_website=$this->official_website;
        $settings->apps=$this->apps;
        $result=$settings->save();
        if($result){
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Update Successfully"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server Error"
            ]);
        }
    }

    public function storeLink()
    {
        $links=new SocialLinks();
        $this->validate([
            'name'=>'required',
            'link'=>'required|url',
            'icon'=>'required|image|mimes:png,svg|max:2048'
        ]);
        $filename="";
        if($this->icon){
            $filename=$this->icon->store('icon','public');
        }
        $links->name=$this->name;
        $links->link=$this->link;
        $links->icon=$filename;
        $result=$links->save();
        if($result){
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Link add successfully"
            ]);
            $this->name="";
            $this->link="";
            $this->icon="";
            return redirect('/settings');
        }else{
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server Error"
            ]);
        }
    }

    // public function update()
    // {
    //     $links= SocialLinks::findOrFail($this->check_links);
    //     $links->link=$this->facebook;
    //     $links->Save();
    //     $this->dispatchBrowserEvent('alert', [
    //         'type' => 'success',
    //         'message' => "Link Update successfully"
    //     ]);
    // }
}
