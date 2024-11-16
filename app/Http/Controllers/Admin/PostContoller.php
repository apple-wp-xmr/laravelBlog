<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostContoller extends Controller
{
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
        try{
            DB::beginTransaction();
                $data = $request->validated();
                $data['preview_image'] = Storage::disk('public')->put('/images',  $data['preview_image']);
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

                $tag_ids = $data['tag_ids'];
                unset($data['tag_ids']);

                $post = Post::firstOrCreate($data);
                $post->tags()->attach($tag_ids);
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            abort(404);
        }
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


        if(isset($data['preview_image'])){
            $data['preview_image'] = Storage::disk('public')->put('/images',  $data['preview_image']);
        }
        if(isset($data['main_image'])){
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }

        $tag_ids = [];
        if(isset($data['tag_ids'])){
            $tag_ids = $data['tag_ids'];
            unset($data['tag_ids']);
       }
        $post->update($data);
        $post->tags()->sync($tag_ids);

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

