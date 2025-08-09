<?php

namespace App\Http\Controllers;

use App\BusinessLayer\ItemBusinessLayer;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $itemsBusinessLayer;

    public function __construct(ItemBusinessLayer $itemsBusinessLayer) {
        $this->itemsBusinessLayer = $itemsBusinessLayer;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = $this->itemsBusinessLayer->getAll();
        return view('backend.pages.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $this->itemsBusinessLayer->store($request->validated());
        return redirect(route('items.index'))->with('success', 'Item has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('backend.pages.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());
        return redirect(route('items.index'))->with('success', 'Item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $this->itemsBusinessLayer->delete($item->id);
        return redirect(route('items.index'))->with('success', 'Item has been deleted successfully');
    }
}
