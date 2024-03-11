<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'size' => 'required', // Add validation for size
            'color' => 'required', // Add validation for color
        ]);
        $user = auth()->user();
        $cart = $user->carts->where('product_id', $id)->first();
        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->total = $request->price * $cart->quantity;
            $cart->save();
        } else {
            Cart::create([
                'product_id' => 1,
                'quantity' => $request->quantity,
                'user_id' => $user->id,
                'price' => 100,
                'total' => $request->price * $request->quantity,
                'size' => $request->size,
                'color' =>  $request->color,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }


    public function showCart()
    {
        $user = auth()->user();
        $cartItems = $user->carts;
        return view('cart', compact('cartItems'));
    }
    public function removeItem($id)
    {
        $cartItem = Cart::find($id);
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found.'], 404);
        }
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'cart deleted successfully !');
    }
}
