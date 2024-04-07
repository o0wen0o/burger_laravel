<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $order = Order::firstOrNew(['user_id' => $userId]);
        return view('profile', compact('order'));
    }
}
