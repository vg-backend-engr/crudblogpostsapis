<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Blog $blog)
    {
        $posts = $blog->posts;
        return response()->json(['data' => $posts], 200);
    }

    public function store(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $post = $blog->posts()->create($request->only(['title', 'content']));
        return response()->json(['data' => $post], 201);
    }

    public function show(Blog $blog, Post $post)
    {
        if ($post->blog_id !== $blog->id) {
            return response()->json(['error' => 'Post not found under this blog'], 404);
        }

        $post->load('likes', 'comments');

        return response()->json(['data' => $post], 200);
    }

    public function update(Request $request, Blog $blog, Post $post)
    {
        if ($post->blog_id !== $blog->id) {
            return response()->json(['error' => 'Post not found under this blog'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $post->update($request->only(['title', 'content']));

        return response()->json(['data' => $post], 200);
    }

    public function destroy(Blog $blog, Post $post)
    {
        if ($post->blog_id !== $blog->id) {
            return response()->json(['error' => 'Post not found under this blog'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
