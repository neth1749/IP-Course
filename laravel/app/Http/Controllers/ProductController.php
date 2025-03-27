<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // --- Get /api/products
    public function getProducts() {
        return Product::all();
    }

    // --- Post /api/products
    public function createProduct(Request $request) {
        $products = new Product;
        $products->name = $request->name;
        $products->pricing = $request->pricing;
        $products->category_id = $request->category_id;
        $products->save();
        return $products;
    }

    // --- Get /api/products/{productId}
    public function getProduct($productId) {
        $products = Product::find($productId);
        return $products;
    }

    // --- Patch /api/products/{productId}
    public function updateProduct(Request $request, $productId) {
        $products = Product::find($productId);
        $products->name = $request->name;
        $products->save();
        return $products;
    }

    // --- Delete /api/products/{productId}
    public function deleteProduct($productId) {
        $products = Product::find($productId);
        $products->delete();
        return $products;
    }

    // --- Get /api/categories/{categoryId}/products
    public function getProductsByCategory($categoryId) {
        $category = Category::with('products')->find($categoryId);
        return $category->products;
    }

}
