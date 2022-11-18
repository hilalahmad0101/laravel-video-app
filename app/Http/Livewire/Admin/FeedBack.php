<?php

namespace App\Http\Livewire\Admin;

use App\Models\FeedBack as ModelsFeedBack;
use Livewire\Component;

class FeedBack extends Component
{
    
    public function render()
    {
        $feedbacks=ModelsFeedBack::latest()->get();

        return view('livewire.admin.feed-back',compact('feedbacks'))->layout('layout.app');
    }
}
