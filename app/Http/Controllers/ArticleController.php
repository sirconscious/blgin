<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
     public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slugs' => 'array', // Array of slug IDs
            'slugs.*' => 'integer|exists:slugs,id',
        ]);

        // Create the article
        $article = \App\Models\Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => auth()->id(),
        ]);

        // Attach predefined slugs by ID
        if (!empty($validated['slugs'])) {
            $article->slugs()->sync($validated['slugs']);
        }

        return response()->json([
            'message' => 'Article created successfully',
            'article' => $article->load('slugs')
        ], 201);
    }
}
