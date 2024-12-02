<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $data =  [];

        $usersCount = User::all()->count();
        $postsCount = Post::all()->count();
        $categoriesCount = Category::all()->count();
        $tagsCount = Tag::all()->count();

        $data['userCount'] = $usersCount;
        $data['postsCount'] = $postsCount;
        $data['categoriesCount'] = $categoriesCount;
        $data['tagsCount'] = $tagsCount;

        return view('admin.main.index', compact('data'));
    }
}
