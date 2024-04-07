<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('admin', compact('items'));
    }
}
