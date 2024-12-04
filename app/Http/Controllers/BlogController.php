<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('blog.index', compact('posts')); 
    }

    public function show(Post $post){
        $post['date'] = Carbon::parse($post->created_at)->translatedFormat('F j, Y • H:i');
        $relatedPosts = Post::where('category_id', $post->category_id)
        ->whereNot('id', $post->id)
        ->get()
        ->take(3);

        return view('blog.post', compact('post', 'relatedPosts'));
    }
    
}
