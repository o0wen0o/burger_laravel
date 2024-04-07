<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function createItem(Request $request)
    {
        $item = new Item();
        $item->name = $request->input('name');
        $item->unit_price = $request->input('unit_price');
        $item->save();
        return redirect()->back();
    }

    public function updateItem(Request $request)
    {
        $item = Item::find($request->input('item_id'));
        $item->name = $request->input('name');
        $item->unit_price = $request->input('unit_price');
        $item->save();
        return redirect()->back();
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->back();
    }
}
