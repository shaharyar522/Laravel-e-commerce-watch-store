<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        // Get new total count for header
        $cartCount = Cart::where('user_id', $userId)->sum('quantity');
        session(['cart_count' => $cartCount]);

        return response()->json([
            'message' => 'Product added to cart',
            'cart_count' => $cartCount
        ]);
    }


    public function viewCart()
    {
        $userId = Auth::id();
        $carts = Cart::with('product')->where('user_id', $userId)->get();

        return view('cart.index', compact('carts'));
    }
    public function updateCart(Request $request)
    {
        foreach ($request->items as $item) {
            Cart::where('id', $item['id'])
                ->update(['quantity' => $item['quantity']]);
        }

        $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        session(['cart_count' => $cartCount]);

        return response()->json(['message' => 'Cart updated']);
    }
}
