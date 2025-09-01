<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

// productsテーブルから、すべてのデータをインスタンスのコレクションとして取得する
$products = Product::all();

class Product extends Model
{
    use HasFactory;
}
