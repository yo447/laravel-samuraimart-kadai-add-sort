<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\posts;
use App\Models\posts_table_dummy;




class PostController extends Controller
{

     
    
     public function show($id) {
        // URL'/products/{id}'の'{id}'部分と主キー（idカラム）の値が一致するデータをproductsテーブルから取得し、変数$productに代入する
        $posts = posts::find($id);
        //$posts = posts_table_dummy::find($id);

        // 変数$productをproducts/show.blade.phpファイルに渡す
        return view('posts.show', compact('posts'));
    }

     

    public function index() {
         

        // 変数$productsをproducts/index.blade.phpファイルに渡す
        //return view('posts.index');
         $posts = DB::table('posts')->get();

        return view('posts.index', ['posts' => $posts]);
       
    //return view('posts.index', compact('posts'));
    }


       
}

