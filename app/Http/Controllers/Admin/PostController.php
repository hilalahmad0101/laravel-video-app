<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.add-post');
    }


    public function category()
    {
        $categories = PostCategory::latest()->get();
        $output = "";
        foreach ($categories as $category) {
            $output .= "<option value='{$category->category_name}'>{$category->category_name}</option>";
        }
        echo $output;
    }


    public function addCategory(Request $request)
    {
        $categories = PostCategory::create([
            'category_name' => $request->category_name,
        ]);
        if ($categories) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function store(Request $request)
    {
        $post = new Post();
        $request->validate(
            [
                'title' => ['required'],
                'content' => ['required'],
                'tags' => ['required'],
                'posting_time' => ['required'],
                'posting_date' => ['required'],
            ],
            [
                'posting_time' => [
                    'required' => 'The post time field is required'
                ],
                'posting_date' => [
                    'required' => 'The post date field is required'
                ]
            ]
        );

        $title = $request->title;
        $description = $request->content;
        $tags = $request->tags;
        $images = $request->file('file');
        $posting_time = $request->posting_time;
        $posting_date = $request->posting_date;
        $filename = $images->store('posts', 'public');
        $post->title = $title;
        $post->description = $description;
        $post->tags = $tags;
        $post->pending_time = $posting_time;
        $post->pending_date = $posting_date;
        $post->images = $filename ? $filename : 'null';
        $post->notification = $request->notification ? 1 : 0;
        $result = $post->save();
        if ($result) {
            return redirect(route('admin.post'));
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Login Successfully"
            ]);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server Problem"
            ]);
        }
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.update-post', compact('posts'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
         $request->validate(
            [
                'title' => ['required'],
                'content' => ['required'],
                'tags' => ['required'],
                'posting_time' => ['required'],
                'posting_date' => ['required'],
            ],
            [
                'posting_time' => [
                    'required' => 'The post time field is required'
                ],
                'posting_date' => [
                    'required' => 'The post date field is required'
                ]
            ]
        );
        $title = $request->title;
        $description = $request->content;
        $tags = $request->tags;
        $old_images = $request->old_images;
        $posting_time = $request->posting_time;
        $posting_date = $request->posting_date;
        $new_images = $request->file('new_files');
        $files = "";
        $destination = public_path('storage\\' . $old_images);
        if($new_images){
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $files = $new_images->store('posts', 'public');
        }else{
            $files=$old_images;
        }
        
        
        $post->title = $title;
        $post->description = $description;
        $post->tags = $tags;
        $post->pending_time = $posting_time;
        $post->pending_date = $posting_date;
        $post->images = $files;
        $result = $post->save();
        if ($result) {
            return redirect(route('admin.post'));
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Login Successfully"
            ]);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Server Problem"
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $posts = Post::findOrFail($id);

            $destination = public_path('storage\\' . $posts->images);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            if ($posts->delete()) {
                return response()->json([
                    'success' => 'true',
                    'message' => 'Post Delete Successfully'
                ]);
            } else {
                return response()->json([
                    'success' => 'false',
                    'message' => 'Some Problem'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => 'false',
                'message' => $th->getMessage()
            ]);
        }
    }
}
