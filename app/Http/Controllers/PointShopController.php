<?php

namespace App\Http\Controllers;

use App\BusinessLayer\ItemBusinessLayer;
use App\Models\UserExchangeHistory;
use Illuminate\Http\Request;

class PointShopController extends Controller
{
    private $itemsBusinessLayer;

    public function __construct(ItemBusinessLayer $itemsBusinessLayer) {
        $this->itemsBusinessLayer = $itemsBusinessLayer;
    }

    public function index()
    {
        $items = $this->itemsBusinessLayer->getAll();
        return view('backend.pages.point-shop.index', compact('items'));
    }

    public function show($id)
    {
        $item = $this->itemsBusinessLayer->getById($id);
        if (!$item) {
            return redirect()->route('point-shop.index')->with('error', 'Item not found.');
        }
        return view('backend.pages.point-shop.show', compact('item'));
    }

    public function purchase(Request $request)
    {
        // Logic to handle item purchase
        $itemId = $request->input('item_id');
        $item = $this->itemsBusinessLayer->getById($itemId);
        if (!$item) {
            return redirect()->route('point-shop.index')->with('error', 'Item not found.');
        }
        // Validate and process the purchase
        $user = auth()->user();
        if ($user->userPoints->point < $item->price) {
            return redirect()->route('point-shop.index')->with('error', 'Insufficient points to purchase this item.');
        }
        // Deduct points and update item stock
        $user->userPoints->decrement('point', $item->price);
        $item->decrement('stock', 1);
        UserExchangeHistory::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'points_used' => $item->price,
            'exchanged_at' => now(),
        ]);
        // Redirect back with success message
        return redirect()->route('point-shop.index')->with('success', 'Item purchased successfully!');
    }

    public function exchangeHistory()
    {
        $user = auth()->user();
        $exchangeHistory = UserExchangeHistory::where('user_id', $user->id)->with('item')->get();
        return view('backend.pages.point-shop.exchange-history', compact('exchangeHistory'));
    }
}
