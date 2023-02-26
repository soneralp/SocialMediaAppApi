<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function create(Request $request){
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->desc = $request->desc;

        // No photo
        if($request->photo != ''){
            // unique identity
            $photo = time().'jpg';
            file_put_contents('storage/posts/'.$photo,base64_decode($request->photo));
            $post->photo = $photo;
        }

        $post->save();
        $post->user;
        return response()->json([
            'success' => true,
            'message' => 'Posted',
            'post' => $post
        ]);

    }

    public function update(Request $request){
        $post = Post::find($request->id);

        // check if user is editing own post
        if(Auth::user()->id != $request->id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized request',
            ]);
        }
        $post->desc = $request->desc;
        $post->update();
        return response()->json([
            'succes' => true,
            'message' => 'Post updated successfully',
        ]);
    }

    public function delete(Request $request){
        $post = Post::find($request->id);
        
        if(Auth::user()->id != $request->id){
            return response()->json([
                'success' => false,
                'message' => 'unauthorized request',
            ]);
        }

        // check if post has photo to delete
        if($post->photo != ''){
            Storage::delete('public/posts/'.$post->photo);
        }
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully',
        ]);
    }

    public function posts(){
        $posts = Post::orderBy('id','desc')->get();
        foreach($posts as $post){
            //get user of post
            $post->user;
            
            //Commnents count
            $post['commentsCount'] = count($post->comments);

            //likes count
            $post['likesCount'] = count($post->likes);

            //check user is liked own post
            foreach($post->likes as $like){
                if($like->user_id == Auth::user()->id){
                    $post['selflike'] = true;
                }
            }
            // default value
            $post['selflike'] = false;

            return response()->json([
                'succes' => true,
                'posts' => $posts,
            ]);
        }
            
    }

}
