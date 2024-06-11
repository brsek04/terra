<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos del formulario, si es necesario
        $request->validate([
            // Validación de campos, si es necesario
        ]);

        // Crear una nueva instancia del pedido
        $order = new Order();

        // Asignar los valores recibidos del formulario
        $order->user_id = $request->user_id;
        // Asignar otros campos del pedido, si es necesario

        // Guardar el pedido en la base de datos
        $order->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('checkout.success')->with('success_msg', 'Pedido realizado con éxito.');
    }
}
