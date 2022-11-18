<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
    public function index()
    {
        try {
            $categories = PostCategory::latest()->get();
            return response()->json([
                'success' => true,
                'categories' => $categories
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function create(Request $request)
    {
        try {
            $categories = PostCategory::create([
                'category_name' => $request->category_name,
            ]);
            if ($categories) {
                return response()->json([
                    'success' => true,
                    'message' => 'Category Add Successfully'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Some problem'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
