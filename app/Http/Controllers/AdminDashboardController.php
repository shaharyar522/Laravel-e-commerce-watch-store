<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\AdminDashboard;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
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

    public function showFrontendProducts()
    {
        $products = Product::orderBy('created_at', 'desc')->get(); // newest first
        return view('welcome', compact('products'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */ public function store(Request $request)
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

    /**
     * Display the specified resource.
     */
    public function show(AdminDashboard $adminDashboard)
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
    public function update(Request $request, $id)
    {


        $product = Product::findOrFail($id);


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


        // Handle image update
        if ($request->hasFile('image_file')) {
            // Create directory if not exists
            if (!file_exists(public_path('uploads/product_img'))) {
                mkdir(public_path('uploads/product_img'), 0777, true);
            }

            // Delete old image if exists and is local
            if ($product->image_url && file_exists(public_path($product->image_url))) {
                unlink(public_path($product->image_url));
            }

            // Upload new image
            $imageName = time() . '_' . $request->file('image_file')->getClientOriginalName();
            $request->file('image_file')->move(public_path('uploads/product_img'), $imageName);
            $imagePath = 'uploads/product_img/' . $imageName;
        } elseif ($request->image_url) {
            // Use provided image URL
            $imagePath = $request->image_url;
        } else {
            // Keep existing image if no new file or URL is provided
            $imagePath = $product->image_url;
        }

        // Update product data
        $product->update([
            'badge' => $request->badge,
            'image_url' => $imagePath,
            'overlay_description' => $request->overlay_description,
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image_url && file_exists(public_path($product->image_url))) {
            unlink(public_path($product->image_url));
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
