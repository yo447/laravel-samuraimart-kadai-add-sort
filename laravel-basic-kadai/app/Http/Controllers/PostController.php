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
        $posts = posts::findOrFail($id);
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

    public function create() {
        return view('posts.create');
    } 

    public function confirm(posts $posts) {
        // HTTPリクエストに含まれる、単一のパラメータの値を取得する     
        $user_name = $posts->input('user_name');
        $user_email = $posts->input('user_email');
        $user_gender = $posts->input('user_gender');
        $category = $posts->input('category');
        $message = $posts->input('message');

        // HTTPリクエストメソッド（GET、POST、PUT、PATCH、DELETEなど）を取得する
        $method = $posts->method();

        // HTTPリクエストのパスを取得する
        $path = $posts->path();

        // HTTPリクエストのURLを取得する
        $url = $posts->url();

        // HTTPリクエストを送信したクライアントのIPアドレスを取得する
        $ip = $posts->ip();

        $variables = [
            'user_name',
            'user_email',
            'user_gender',
            'category',
            'message',
            'method',
            'path',
            'url',
            'ip'
        ];

        return view('posts.confirm', compact($variables));
    }    

   


       
}

