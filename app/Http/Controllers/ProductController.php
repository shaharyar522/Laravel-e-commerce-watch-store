<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'badge' => 'nullable|string|max:255',
            'image_file' => 'nullable|image',
            'image_url' => 'nullable|url',
            'overlay_description' => 'nullable|string',
            'category' => 'required|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Ensure at least one image is provided
        if (!$request->hasFile('image_file') && !$request->image_url) {
            return back()->withErrors(['image_file' => 'Please upload a file or provide an image URL.']);
        }

        // Handle file upload
        if ($request->hasFile('image_file')) {
            if (!file_exists(public_path('uploads/product_img'))) {
                mkdir(public_path('uploads/product_img'), 0777, true);
            }
            $imageName = time() . '_' . $request->file('image_file')->getClientOriginalName();
            $request->file('image_file')->move(public_path('uploads/product_img'), $imageName);
            $imagePath = 'uploads/product_img/' . $imageName;
        } else {
            $imagePath = $request->image_url;
        }

        Product::create([
            'badge' => $request->badge,
            'image_url' => $imagePath,
            'overlay_description' => $request->overlay_description,
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
