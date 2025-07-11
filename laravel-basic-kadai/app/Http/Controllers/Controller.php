<?php
/*
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}*/


namespace App\Http\Controllers;

 use Exception;
use Illuminate\Http\Request;

class HelloController extends Controller {
    public function index() {
        $name = '侍 太郎';
        $languages = ['HTML', 'CSS', 'JavaScript', 'PHP'];

        throw new Exception('例外が発生しました！');

        // 変数$name、$languagesをindex.blade.phpファイルに渡す        
        return view('index', compact('name', 'languages'));
    }
}
