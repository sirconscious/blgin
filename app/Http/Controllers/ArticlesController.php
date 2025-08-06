<?php
namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Slug;
use Illuminate\Http\Request;

class ArticlesController extends Controller // Fixed typo
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|integer|exists:users,id', 
            "level_id" => 'nullable|integer|exists:levels,id', // Validate level_id
            'slug_ids' => 'nullable|array',
            'slug_ids.*' => 'integer|exists:slugs,id'
        ]);

        $article = Article::create([
            'title' => $validated['title'],        // Use title, not slug
            'content' => $validated['content'],    // Use content, not description  
            'user_id' => $validated['user_id'],    // Don't forget user_id 
            "level_id" => $validated['level_id'] , // Use level_id if provided
        ]);

        // Sync the slugs
        $article->slugs()->sync($validated['slug_ids'] ?? []);

        return response()->json([
            'message' => 'Article created successfully!',
            'article' => $article->load('slugs'), // Include the created article with slugs
            'validated_data' => $validated,
        ], 201);
    } 
    public function index()
    {
        $articles = Article::with('user', 'slugs' , "level")->get();
        return response()->json($articles);
    }
}