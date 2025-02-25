<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'products' => [
                ['id' => 1, 'name' => 'Product 1'],
                ['id' => 2, 'name' => 'Product 2'],
                ['id' => 3, 'name' => 'Product 3'],
            ]
        ];
        //return view('products.index', compact('data'));
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('products.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('products.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TDDO: Implement destroy method
    }
}
