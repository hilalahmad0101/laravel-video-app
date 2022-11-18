<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::latest()->get();
            return response()->json([
                'success' => true,
                'categories' => $categories
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $categories = new Category();
            $validation = Validator::make(
                $request->all(),
                [
                    'category_name' => ['required'],
                ],
            );
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $category_name = $request->category_name;
                $icon = $request->file('icons');

                $filename = "";
                if ($icon) {
                    $filename = $icon->store('category', 'public');
                }

                $categories->category_name = $category_name;
                $categories->icon = $filename;
                $result = $categories->save();
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Category Add Successfully'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Some Problem'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $categories = Category::findOrFail($id);
            return response()->json([
                'success' => true,
                'categories' => $categories
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $categories = Category::findOrFail($id);
            $validation = Validator::make(
                $request->all(),
                [
                    'category_name' => ['required'],
                ],
            );
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $category_name = $request->category_name;
                $new_icon = $request->file('new_icons');
                $old_icon = $request->old_icons;

                $filename = "";
                if ($new_icon) {
                    $filename = $new_icon->store('category', 'public');
                } else {
                    $filename = $old_icon;
                }

                $categories->category_name = $category_name;
                $categories->icon = $filename;
                $result = $categories->save();
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Category Update Successfully'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Some Problem'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }


    public function delete($id)
    {
        $categories = Category::findOrFail($id);
        $destination = public_path('storage\\' . $categories->icon);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        if ($categories->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Category Delete Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Some Problem'
            ]);
        }
    }
}
