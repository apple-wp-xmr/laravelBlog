<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagePostController extends Controller
{
    public function store(Request $request){
        dd($request->all());
    }
}
