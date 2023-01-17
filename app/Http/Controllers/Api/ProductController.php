<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function userHasProducts()
    {
        $data = User::with('products')->get();
        return view('welcome');
    }
    public function productBelongsToUser($id)
    {
        $product = Product::find($id);
        return $product->user;
    }
}
