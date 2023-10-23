<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tag;
class MainController extends Controller
{
    public function index(){
        
        // Tag::create([
        //     'title' => 'Привет мир!',
        // ]);

        $tag = new Tag();
        $tag->title = 'Привет мир';
        $tag->save();

        return view('admin.index',[ 'title' => 'Admin']);
        
    }
}
