<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PostController extends Controller
{
    public function index() {
         

        // 変数$productsをproducts/index.blade.phpファイルに渡す
        return view('posts.index');
        
    //return view('posts.index', compact('posts'));
    }
}
