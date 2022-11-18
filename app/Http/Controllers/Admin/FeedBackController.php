<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedBackController extends Controller
{
    public function index()
    {
        try {
            $feedbacks = FeedBack::latest()->get();
            return response()->json([
                'success' => true,
                'feedbacks' => $feedbacks
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => true,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $feedbacks = new FeedBack();
            $validation = Validator::make(
                $request->all(),
                [
                    'name' => ['required'],
                    'email' => ['required', 'email'],
                    'feedback' => ['required'],
                ],
            );
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $name = $request->name;
                $email = $request->email;
                $feedback = $request->feedback;

                $feedbacks->name = $name;
                $feedbacks->email = $email;
                $feedback->feedback = $feedback;
                $result = $feedback->save();
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => 'FeedBack Successfully Added'
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
                'success' => true,
                'message' => $th->getMessage()
            ]);
        }
    }
}
