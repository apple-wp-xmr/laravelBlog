<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
     {    

        $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image'
        ]);

        $data = $request->all();

        if($request->hasFile('thumbnail'))
        {
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}");
        }

        $post = Post::create($data);
        
        $post->tags()->sync($request->tags); 

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
    
        return view('admin.posts.edit', compact('post', 'categories', 'tags' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        // Step 2: Validate the input data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);

        // Step 1: Retrieve the post
        $post = Post::find($id);

        // Step 3: Update the post's attributes
        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            Storage::delete($post->thumbnail);
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}");
        }

        // Update the post attributes
        $post->update($data);

        // Step 4: Save the changes to the database
        $post->tags()->sync($request->tags);

        // Step 5: Redirect back with a success message
        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::find($id);
        // $category->delete();


        
        return redirect()->route('posts.index')->with('success', 'Статтья удалена');
    }
}
