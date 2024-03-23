<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        $query = Post::orderByDesc('updated_at')->orderByDesc('created_at');

        if($filter){
            $value = $filter === 'published';
            $query->whereIsPublished($value);
        }

        $posts = $query->paginate(10)->withQueryString();
        return view('admin.posts.index', compact('posts', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $post = new Post();

        $post->fill($data);
        $post->slug = Str::slug($post->title);
    
        $post->save();

        return to_route('admin.posts.show', $post)->with('message', 'Post creato con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('admin.posts.index')->with('type', 'danger')->with('message', 'Post eliminato con successo');
    }
}
