<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return response()->json(['data' => $blogs], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $blog = Blog::create($request->only(['title', 'content']));
        return response()->json(['data' => $blog], 201);
    }

    public function show($id)
    {
        $blog = Blog::with('posts')->find($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        return response()->json(['data' => $blog], 200);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $blog->update($request->only(['title', 'content']));

        return response()->json(['data' => $blog], 200);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        $blog->delete();

        return response()->json(['message' => 'Blog deleted successfully'], 200);
    }

    public function seedDatabase()
    {
        // Clear existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Blog::truncate();
        Post::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Seed users
        $user = User::create([
            'name' => 'Ultimate Blogger', // User name
            'email' => 'emmablogs@gmail.com', // User email
            'password' => Hash::make('B%123VGafj'), // user password
        ]);

        // Seed blogs
        $blog1 = Blog::create([
            'title' => 'Food Blog',
            'content' => 'Food blogging includes writing and uploading traditional and contemporary recipes, as well as reviewing food at different restaurants.',
        ]);

        $blog2 = Blog::create([
            'title' => 'Book Blog',
            'content' => 'For book bloggers who want to share their passion with like-minded people.',
        ]);

        // Seed posts for Blog 1
        $post1 = $blog1->posts()->create([
            'title' => 'The Best Nigerian Jollof Rice Recipe',
            'content' => '1. Wash the peppers, onion, and tomatoes.2. Blend the chopped ingredients together.3 Rinse the rice in water until it runs clear. 4 Heat the vegetable oil over medium heat. 5. Chop 1 onion and saute it in the oil for 4 minutes. 6. Cook the tomato paste for 5 minutes.',
       
        ]);

        $post2 = $blog1->posts()->create([
            'title' => 'Second Post of Food Blog',
            'content' => 'Content of the second post under Food Blog.',
        ]);

        // Seed posts for Blog 2
        $post3 = $blog2->posts()->create([
            'title' => 'Guide to Read a Book',
            'content' => 'Read the title and the preface. Study the table of contents. Check the index. Read the blurb. Look at the main chapters. Skim the book, reading it here and there..',

        ]);

        $post4 = $blog2->posts()->create([
            'title' => 'Second Post of Book Blog',
            'content' => 'Content of the second post under Book Blog.',
        ]);
        

        return response()->json(['message' => 'Database seeded successfully'], 200);
    }
}
