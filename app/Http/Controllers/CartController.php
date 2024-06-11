<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order; // Asegúrate de importar el modelo Order
use Illuminate\Support\Facades\DB;

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

    public function checkout()
{
    $userId = auth()->id(); // Supongamos que tienes un sistema de autenticación y necesitas el ID del usuario

    $order = Order::create([
        'user_id' => $userId,
        // Otros campos de la orden, si los hay
    ]);

    $cartCollection = \Cart::getContent();

    foreach ($cartCollection as $item) {
        if ($item->attributes->type == 'dish') {
            // Obtener el ID del plato eliminando el prefijo 'dish_'
            $dishId = (int)str_replace('dish_', '', $item->id);
            
            DB::table('dishes_in_order')->insert([
                'order_id' => $order->id,
                'dish_id' => $dishId,
                'quantity' => $item->quantity,
                // Otros campos, si los hay
            ]);
        } elseif ($item->attributes->type == 'beverage') {
            // Obtener el ID del bebida eliminando el prefijo 'beverage_'
            $beverageId = (int)str_replace('beverage_', '', $item->id);
            
            DB::table('beverages_in_order')->insert([
                'order_id' => $order->id,
                'beverage_id' => $beverageId,
                'quantity' => $item->quantity,
                // Otros campos, si los hay
            ]);
        }
    }

    \Cart::clear();

    return redirect()->route('checkout.success')->with('success_msg', 'Pedido realizado con éxito.');
}

}
