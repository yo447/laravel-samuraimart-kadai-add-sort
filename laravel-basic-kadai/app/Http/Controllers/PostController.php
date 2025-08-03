<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Post;
use Illuminate\Support\Facades\DB;
use App\Models\posts;
use App\Models\posts_table_dummy;

use App\Models\Vendor;
//use App\Http\Requests\PostStoreRequest;




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

    public function store(Request $request) {
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

