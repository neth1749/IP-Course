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
   // --- Post /api/products
   public function createProduct(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'pricing' => 'required|numeric|min:0',
        'category_id' => 'required|integer|exists:categories,id',
        'description' => 'nullable|string',
        'images' => 'nullable|array',
        'images.*' => 'url'
    ]);

    $product = Product::create($validated);

    return response()->json($product, 201);
}

    // --- Get /api/products/{productId}
   // --- Get /api/products/{productId}
   public function findProductByID($productId) {
    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    return response()->json($product, 200);
}

// --- Patch /api/products/{productId}
public function updateProducts(Request $request, $productId)
{
$product = Product::find($productId);

if (!$product) {
    return response()->json([
        'message' => 'Product not found'
    ], 404);
}

$validatedData = $request->validate([
    'name' => 'sometimes|string|max:255',
    'category_id' => 'sometimes|exists:categories,id',
    'pricing' => 'sometimes|numeric|min:0',
    'description' => 'nullable|string',
    'images' => 'nullable|array',
]);

if (isset($validatedData['images'])) {
    $validatedData['images'] = json_encode($validatedData['images']);
}

$product->update($validatedData);

return response()->json([
    'message' => 'Product updated successfully',
    'product' => $product->fresh(),
], 200);
}
// --- Delete /api/products/{productId}
public function deleteProducts($productId)
{
    $product = Product::find($productId);
    if (!$product) {
        return response()->json([
            'message' => 'Product not found'
        ], 404);
    }
    $product->delete();

    return response()->json(['message' => 'Product deleted successfully']);
}

// --- Get /api/categories/{categoryId}/products
public function getProductsByCategory($categoryId) {
    $category = Category::with('products')->find($categoryId);
    return $category->products;
}
}
