<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostContoller extends Controller
{
    public $service;

    public function __construct(PostService $service){
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, post $post)
    {
        $data = $request->validated();


        $post = $this->service->update($data, $post);

        return redirect()->route('admin.post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        // $post->tags()->detach(); because we use soft deletes
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}

