<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likePost(Request $request, Post $post)
    {
        // Logic to like a post
        $like = $post->likes()->create([]);

        return response()->json(['data' => $like], 201);

        
    }

    public function unlikePost(Request $request, Post $post)
    {
        // Logic to unlike a post
        $post->likes()->delete();

        return response()->json(['message' => 'Post unliked successfully'], 200);
    }
}
