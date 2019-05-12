<?php

namespace App\Http\Controllers;

use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //
    public function addComment(PostService $postService, Request $request)
    {
        $user = Auth::user();
        $datas = [
            'name' => $user->name,
            'email' => $user->email,
            'comment' => $request->input('comment'),
            'accept' => 1,
            'id_post' => $request->input('postID'),
            'user_id' => $user->id,
            'data_type' => 'App\\Model\\BlogPost'
        ];
        $validator = Validator::make($datas, ['comment' => ' required|min:20']);
        if ($validator->fails()):
            return redirect()->back()->withErrors($validator->errors());
        endif;
        try {
            if (isset($datas) && $datas != null) {
                $postService->addComment($datas);
                return redirect()->back()->with([
                    'error' => false,
                    'messageStatus' => 'Comment has posted'
                ]);
            } else {
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'An error occurred. Comment can\'t posted'
                ]);
            }
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->back()->with([
                'error' => true,
                'messageStatus' => 'Unknown error',
                'errorMessage' => $throwable->getMessage()
            ]);
        }
    }

    public function addSubComment(Request $request, PostService $postService)
    {
        $user = Auth::user();
        $datas = [
            'name' => $user->name,
            'email' => $user->email,
            'comment' => $request->input('comment'),
            'accept' => 1,
            'id_comment_parent' => $request->input('id_parent'),
            'id_post' => $request->input('id_post'),
            'user_id' => $user->id,
            'data_type' => 'App\\Model\\BlogPost'
        ];
        try {
            if (isset($datas) && $datas != null) {
                $postService->addSubComment($datas);
                return response()->json([
                    'error' => false,
                    'messageComment' => 'Comment has posted'
                ])->setStatusCode(\Illuminate\Http\Response::HTTP_OK);
            } else {
                return response()->json([
                    'error' => true,
                    'messageComment' => 'An error occurred. Comment can\'t posted'
                ])->setStatusCode(\Illuminate\Http\Response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $throwable) {
            dd($throwable->getMessage());
            DB::rollBack();
            return response()->json([
                'error' => true,
                'messageComment' => 'Unknown error',
                'errorMessage' => $throwable->getMessage()
            ])->setStatusCode(\Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }
}
