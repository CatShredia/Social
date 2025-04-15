<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view("post.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image_file')) {
            $imageName = $this->postService->setImage($request);

            $data['image_storage_url'] = $imageName;

            unset($data['image_file']);
        }

        $post = $this->postService->store($data);

        return redirect(route('post.index'))->with('success', 'Post was Created!')->with('clearLocalStorage', true);;
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->hasFile('image_file')) {
            $imageName = $this->postService->setImage($request);

            $data['image_storage_url'] = $imageName;

            unset($data['image_file']);
        }

        $this->postService->update($data, $post);

        return redirect(route('post.index'))->with('success', 'Post was Editing!')->with('clearLocalStorage', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
