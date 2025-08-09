<?php

namespace App\BusinessLayer;

use App\Models\Item;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ItemBusinessLayer
{

    public function getAll(): LengthAwarePaginator
    {
        return Item::exclude(['updated_at'])->paginate(10);
    }

    public function getById($id): ?Item
    {
        return Item::find($id);
    }

    public function store($request): void
    {
        Item::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'stock' => $request['stock'],
            'image' => $request['image'] ?? null,
            'status' => $request['status'] ?? true,
            'redeem_limit' => $request['redeem_limit'],
        ]);
    }

    public function delete($id): void
    {
        $item = Item::find($id);
        $item->delete();
    }

    // user with role: user stuff
    public function getUserReports($userId): LengthAwarePaginator
    {
        return Item::where('user_id', $userId)->paginate(10);
    }
}
