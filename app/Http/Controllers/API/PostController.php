<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Liste des articles'
        ]);
    }

    public function store(CreatePostRequest $request)
    {
        
       try {

        $post = new Post();
        
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();
        
        return response()->json([
            'message' => 'Article créé avec succès',
            'datas' => $post
        ]);
        
       } catch (Exception $e) {
            return response()->json($e);
       }
    }
}
