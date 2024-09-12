<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Display a listing of the items
    public function index()
    {   
        $items = Item::all();  // Fetch all items from the database
        return view('items.index', compact('items')); // Pass the items to the view
    }

    // Show the form for creating a new item
    public function create()
    {
        return view('items.create');  // Return the form for adding new items
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        Item::create($validatedData);  // Save the new item to the database

        return redirect()->route('items.index');
    }

    // Display the specified item
    public function show($id)
    {
        $item = Item::findOrFail($id);  // Find the item by ID
        return view('items.show', compact('item'));  // Show the item details
    }

    // Show the form for editing the specified item
    public function edit($id)
    {
        $item = Item::findOrFail($id);  // Get the item to edit
        return view('items.edit', compact('item'));  // Show the edit form
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);
    
        $item = Item::findOrFail($id);
        $item->update($validatedData);  // Update the item in the database
    
        return redirect()->route('items.index');
    }

    // Remove the specified item from storage
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();  // Delete the item
    
        return redirect()->route('items.index');
    }
}