<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\UpdatePostRequest;

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

    public function update(EditPostRequest $request, Post $post)
    {
        
        try {
        
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();
        
        return response()->json([
            'message' => 'Post a éte mise à jour avec succès',
            'datas' => $post
        ]);
        
            
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function delete(Post $post)
    {
        try {

           $post->delete();

           return response()->json([
            'message' => 'Post a éte effacé à jour avec succès',
            'datas' => $post
        ]);

            
        } catch (Exception $e) {
            response()->json($e);
        }
    }
}
