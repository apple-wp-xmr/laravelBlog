<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Tag;
class MainController extends Controller
{
    public function index(){
        


        return view('admin.index',[ 'title' => 'Admin']);
        
    }
}
