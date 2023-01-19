<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ResponseHelper;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $responseHelpers;
    function __construct(ResponseHelper $responseHelper)
    {
        $this->responseHelpers = $responseHelper;
    }
    public function userHasProducts()
    {
        $data = User::with('products')->get();
        return $data;
    }
    public function productBelongsToUser($id)
    {
        $product = Product::find($id);
        return $product->user;
    }
    public function getProducts()
    {
        $data = Product::all();
        $book = [];
        $tags = [];
        foreach ($data as $item) {
            $tags = [];
            foreach ($item->tags->all() as $tag) {
                $tags[] = [
                    $tag->name
                ];
            }
            $book[] = [
                'id' => $item->id,
                'book name' => $item->name,
                'tag' => $tags
            ];
        }
        return $this->responseHelpers->success(true, "success get data products", $book);
    }
    public function productAttachTag(Request $request)
    {
        $product = Product::find($request->get('product_id'));
        $product->tags()->attach($request->get('tag_id'));
        return $this->responseHelpers->success(true, "success attach data tags", [], 201);
    }
    public function productDetachTag(Request $request, $id)
    {
        $product = Product::find($id);
        $product->tags()->detach($request->get('tag_id'));
        return $this->responseHelpers->success(true, "success detach data product", []);
    }
    public function productSynchTag(Request $request, $id)
    {
        $product = Product::find($id);
        $product->tags()->sync($request->get('tag_id'));
        return $this->responseHelpers->success(true, "success sync data product", []);
    }
}
