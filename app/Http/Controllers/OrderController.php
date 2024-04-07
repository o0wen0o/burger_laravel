<?php

namespace App\Http\Controllers;

use App\Models\ItemOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addItem(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
        ]);

        $userId = Auth::user()->id;
        $order = Order::firstOrNew(['user_id' => $userId]);
        $item = ItemOrder::firstOrNew(['order_id' => $order->id, 'item_id' => $request->item_id]);

        $item->quantity = $request->quantity;
        $item->item_id = $request->item_id;

        $item->save();
        return redirect()->route('home')->with('success', 'Item added successfully');
    }

    public function updateOrder(Request $request)
    {
        $itemOrder = ItemOrder::find($request->item_order_id);
        $itemOrder->quantity = $request->quantity;
        $itemOrder->save();
        return redirect()->route('profile')->with('success', 'Order updated successfully');
    }

    public function deleteOrder($id)
    {
        $itemOrder = ItemOrder::find($id);
        $itemOrder->delete();
        return redirect()->route('profile')->with('success', 'Order deleted successfully');
    }
}
