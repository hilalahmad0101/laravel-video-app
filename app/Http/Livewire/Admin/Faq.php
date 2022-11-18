<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Faq as ModelsFaq;
use Livewire\Component;

class Faq extends Component
{

    public $cat_id,$question,$answer;
    public $edit_cat_id,$edit_question,$edit_answer;
    public $edit_id;
    public function render()
    {
        $faqs = ModelsFaq::latest()->get();
        $categories = Category::latest()->get();
        return view('livewire.admin.faq', compact(['faqs', 'categories']))->layout('layout.app');
    }

    public function store()
    {
        $faqs = new ModelsFaq();
        $this->validate(
            [
                'cat_id'=>'required',
                'question' => ['required'],
                'answer' => ['required'],
            ],
        );

        $faqs->cat_id = $this->cat_id;
        $faqs->question = $this->question;
        $faqs->answer = $this->answer;
        $result = $faqs->save();
        if ($result) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Faq Create Successfully"
            ]);
            $this->cat_id="";
            $this->question="";
            $this->answer="";
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server problem"
            ]);
        }
    }

    public function edit($id)
    {
        $faq=ModelsFaq::findOrFail($id);
        $this->edit_id=$id;
        $this->edit_cat_id=$faq->cat_id;
        $this->edit_question=$faq->question;
        $this->edit_answer=$faq->answer;
    }

    public function update()
    {
        $faqs =  ModelsFaq::findOrFail($this->edit_id);
        $faqs->cat_id = $this->edit_cat_id;
        $faqs->question = $this->edit_question;
        $faqs->answer = $this->edit_answer;
        $result = $faqs->save();
        if ($result) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Faq Update Successfully"
            ]);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server problem"
            ]);
        }
    }

    public function delete($id)
    {
        $result=ModelsFaq::findOrFail($id)->delete();
        if ($result) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Faq Delete Successfully"
            ]);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server problem"
            ]);
        }
    }
}
