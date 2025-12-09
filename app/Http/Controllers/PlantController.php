<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    public function shop(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $plants = Plant::where('name', 'like', "%{$search}%")->get();
        } else {
            $plants = Plant::all();
        }

        return view('store', compact('plants', 'search'))->with('title', 'Store');
    }

    public function home()
    {
        $plants = Plant::all();
        return view('home', compact('plants'));
    }

    public function index()
    {
        $plants = Plant::with('category')->get();
        return view('plants.index', compact('plants'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('plants.create', compact('categories'));
    }

    // STORE NEW PLANT
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'stock'       => 'required|integer',
            'price'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Upload image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plants', 'public');
        }

        Plant::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'stock'       => $request->stock,
            'price'       => $request->price,
            'image_url'   => $imagePath
        ]);

        return redirect()->route('plants.index')->with('success', 'Plant created successfully.');
    }

    public function show($id)
    {
        $plant = Plant::findOrFail($id);
        return view('plants.show', compact('plant'));
    }

    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        $categories = Category::all();
        return view('plants.edit', compact('plant', 'categories'));
    }

    // UPDATE PLANT
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'stock'       => 'required|integer',
            'price'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $plant = Plant::findOrFail($id);

        // Handle image replace
        if ($request->hasFile('image')) {
            // Delete old file
            if ($plant->image_url && Storage::disk('public')->exists($plant->image_url)) {
                Storage::disk('public')->delete($plant->image_url);
            }

            // Upload new file
            $plant->image_url = $request->file('image')->store('plants', 'public');
        }

        $plant->name = $request->name;
        $plant->category_id = $request->category_id;
        $plant->stock = $request->stock;
        $plant->price = $request->price;

        $plant->save();

        return redirect()->route('plants.index')->with('success', 'Plant updated successfully.');
    }

    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);

        // delete image
        if ($plant->image_url && Storage::disk('public')->exists($plant->image_url)) {
            Storage::disk('public')->delete($plant->image_url);
        }

        $plant->delete();

        return redirect()->route('plants.index')->with('success', 'Plant deleted successfully.');
    }
}
