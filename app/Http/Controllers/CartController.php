<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
    public function shop($menuId)
    {
        $menu = Menu::with(['dishes', 'beverages'])->findOrFail($menuId);
        return view('shop', compact('menu'));
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request)
    {
        $prefix = $request->type == 'dish' ? 'dish_' : 'beverage_';
        
        \Cart::add([
            'id' => $prefix . $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'photo' => $request->photo,
                'type' => $request->type
            ]
        ]);
        return redirect()->route('cart.index')->with('success_msg', 'Item added to your cart!');
    }

    public function update(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);
        return redirect()->route('cart.index')->with('success_msg', 'Cart is updated!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Cart is cleared!');
    }
}

