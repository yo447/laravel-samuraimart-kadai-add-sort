<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Post;
use Illuminate\Support\Facades\DB;
use App\Models\posts;
use App\Models\posts_table_dummy;

use App\Models\Vendor;
use App\Http\Requests\PostStoreRequest;




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

   /* public function create() {
        return view('posts.create');
    } 
   *//*
    public function confirm(Post $posts) {
        // HTTPリクエストに含まれる、単一のパラメータの値を取得する     
        $user_name = $posts->input('user_name');
        $user_email = $posts->input('user_email');
        $user_gender = $posts->input('user_gender');
        $title = $posts->input('title');
        $content = $posts->input('content');

        // HTTPリクエストメソッド（GET、POST、PUT、PATCH、DELETEなど）を取得する
        $method = $request->method();

        // HTTPリクエストのパスを取得する
        $path = $request->path();

        // HTTPリクエストのURLを取得する
        $url = $request->url();

        // HTTPリクエストを送信したクライアントのIPアドレスを取得する
        $ip = $request->ip();

        $variables = [
            'user_name',
            'user_email',
            'user_gender',
            'title',
            'content',
            'method',
            'path',
            'url',
            'ip'
        ];

        return view('posts.confirm', compact($variables));
    }    */

    
     public function create() {
        return view('posts.create');
    }

    public function store(PostStoreRequest $request) {
        // フォームの入力内容をもとに、テーブルにデータを追加する
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:255'
        ]);
        $posts = new posts();
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
       // $posts->vendor_code = $request->input('vendor_code');
        $posts->save();
          
        // リダイレクトさせる
        return redirect("/posts");
    }
   
 
}

