<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Repositories\PostRepository;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_dashboard()
    {
        return view("admin.index");
    }
    public function index_post(PostRepository $postRepository)
    {
        $posts = $postRepository->all();
        return view("admin.posts.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, PostRepository $postRepository)
    {
        $data = [
            "title" => $request->safe()->title,
            "content" => $request->safe()->content,
            "categories" => $request->safe()->categories,
            "user_id" => auth()->user()->id,
        ];

        $data['image'] = $postRepository->uploadImage($request);

        $postRepository->create($data);
       return redirect()->route('posts.index')->with('success','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, PostRepository $postRepository)
    {
        $post = $postRepository->find($post->id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, PostRepository $postRepository)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post, PostRepository $postRepository)
    {
        $post = $postRepository->find($post->id);
        $data = [
            "title" => $request->safe()->title,
            "content" => $request->safe()->content,
            "categories" => $request->safe()->categories,
            "user_id" => auth()->user()->id,
        ];

        $data['image'] = $postRepository->uploadImage($request);

        $postRepository->update($post->id,$data);
       return redirect()->route('posts.index')->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, PostRepository $postRepository)
    {
        $postRepository->delete($post->id);

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
