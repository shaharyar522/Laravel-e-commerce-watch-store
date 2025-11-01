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

        // where come from json add to card buttun

        //   {
        //   "product_id" : 6
        //         }

        $productId = $request->input('product_id');  // Get the product_id
        $userId = Auth::id();

        // Now it checks if that product is already in this user's cart:
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cart) {

            $cart->quantity += 1;  // If it already exists, increase quantity
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

        $total = $carts->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('carts', 'total'));
    }


    public function remove($id)
    {
        $userId = Auth::id();

        // Find cart item in database
        $cartItem = Cart::where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        // Update cart count
        $cart_count = Cart::where('user_id', $userId)->sum('quantity');
        session(['cart_count' => $cart_count]);

        return response()->json([
            'message' => 'Item removed',
            'cart_count' => $cart_count
        ]);
    }




    public function updateCart(Request $request)
    {
        foreach ($request->items as $item) {
            Cart::where('id', $item['id'])->update(['quantity' => $item['quantity']]);
        }

        return response()->json(['message' => 'Cart updated']);
    }
}
