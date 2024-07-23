<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        
        return view('products.index', [
            'chirps' => Product::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
        ]);
 
        $request->user()->chirps()->create($validated);
 
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $chirp): View
    {
        //
        Gate::authorize('update', $chirp);
 
        return view('products.edit', [
            'chirps' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $chirp): RedirectResponse
    {
        //
        Gate::authorize('update', $chirp);
 
        $validated = $request->validate([
           'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
        ]);
 
        $chirp->update($validated);
 
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $chirp): RedirectResponse
    {
        //
        Gate::authorize('delete', $chirp);
 
        $chirp->delete();
 
        return redirect(route('products.index'));
    }
}
