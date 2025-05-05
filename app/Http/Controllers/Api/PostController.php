<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $post = Post::create($validated);
        return response()->json(['message' => 'the post was created !', 'post' => $post], 201);
    }

    public function show( int $id)
    {  
        $post = Post::find($id);
        if(!$post)
        {
            return response()->json(['message' => 'the post was not found !' ]);
        }
        return response()->json(['message' => 'the post was  found !' ,'post'=>$post]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json(['message' => 'the post was updated !', 'post' => $post]);
    }

    public function destroy( int $id )
    {
        $post = Post::find($id);
        if(!$post)
        {
            return response()->json(['message' => 'the post was not found !' ]);
        }
        $post->delete();
        return response()->json(['message' => 'the post was deleted !' ]);
    }
}
?>