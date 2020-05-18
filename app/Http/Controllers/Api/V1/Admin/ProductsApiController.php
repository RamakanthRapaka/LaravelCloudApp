<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductsApiController extends Controller {

    public function index() {
        $products = Product::all();

        return $products;
    }

    public function ProductMatch(Request $request) {

        $validator = \Validator::make($request->all(), ['code' => 'required']);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'response_cocde' => 422, 'message' => 'Field Is Required!']);
        }

        $product = Product::where('code', $request->input('code'))->first();

        if ($product === NULL) {
            return response()->json(['response_cocde' => 402, 'message' => 'No Records Found!']);
        }

        if ($product != NULL) {
            \Log::info('Hello');
            $product->count = $product->count + 1;
            $product->updatedOn = Carbon::now();
            $product->save();

            return response()->json(['response_cocde' => 200, 'message' => 'Records Found!']);
        }
    }

    public function store(StoreProductRequest $request) {
        return Product::create($request->all());
    }

    public function update(UpdateProductRequest $request, Product $product) {
        return $product->update($request->all());
    }

    public function show(Product $product) {
        return $product;
    }

    public function destroy(Product $product) {
        return $product->delete();
    }

}
