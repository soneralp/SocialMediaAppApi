<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create(Request $request){
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->id;
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'Comment added'
        ]);
    }

    public function update(Request $request){
        $comment = Comment::find($request->id);

        // check if user is editing own comment
        if($comment->id != Auth::user()->id ){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized request',
            ]);
        }
        $comment->comment = $request->comment;
        $comment->update();
        return response()->json([
            'succes' => true,
            'message' => 'comment updated successfully',
        ]);
    }


    public function delete(Request $request){
        $comment = Comment::find($request->id);

        // check if user is editing own comment
        if($comment->id != Auth::user()->id ){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized request',
            ]);
        }
        $comment->delete();
        return response()->json([
            'succes' => true,
            'message' => 'comment deleted successfully',
        ]);
    }

    public function comments(Request $request){
        $comments = Comment::where('post_id', '=', $request->id)->get();
        // show user of each comments
        foreach($comments as $comment){
            $comment->user;
        }
        return response()->json([
            'succes' => true,
            'message' => $comments,
        ]);

    }
}
