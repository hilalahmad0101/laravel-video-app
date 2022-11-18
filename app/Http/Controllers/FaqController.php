<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        try {
            $faqs = Faq::with(['categories'])->latest()->get();
            return response()->json([
                'success' => true,
                'faqs' => $faqs
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $faqs = new Faq();
            $validation = Validator::make(
                $request->all(),
                [
                    'question' => ['required'],
                    'answer' => ['required'],
                ],
            );
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $faqs->cat_id = $request->cat_id;
                $faqs->question = $request->question;
                $faqs->answer = $request->answer;
                $result = $faqs->save();
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Faq Add Successfully',
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Some Problem',
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $faqs = Faq::findOrFail($id);
            return response()->json([
                'success' => true,
                'faqs' => $faqs
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $faqs =  Faq::findOrFail($id);
            $validation = Validator::make(
                $request->all(),
                [
                    'question' => ['required'],
                    'answer' => ['required'],
                ],
            );
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $faqs->cat_id = $request->cat_id;
                $faqs->question = $request->question;
                $faqs->answer = $request->answer;
                $result = $faqs->save();
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Faq Update Successfully',
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Some Problem',
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $faqs = Faq::findOrFail($id)->delete();
            if ($faqs) {
                return response()->json([
                    'success' => true,
                    'message' => 'Faq Delete Successfully',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Some Problem',
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }
}
