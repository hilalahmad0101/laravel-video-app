<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post as ModelsPost;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Post extends Component
{
    public function render()
    {
        $posts = ModelsPost::latest()->get();
        return view('livewire.admin.post', compact('posts'))->layout('layout.app');
    }


    public function delete($id)
    {
        $posts = ModelsPost::findOrFail($id);

        $destination = public_path('storage\\' . $posts->images);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        if ($posts->delete()) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Post Delete successfully"
            ]);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server Problem"
            ]);
        }
    }
}
