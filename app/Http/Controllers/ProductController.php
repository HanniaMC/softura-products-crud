<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::with('category')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('name', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(
        [
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ],
//los errores humanos saldran en español y no por default en ingles
        [
            'name.required' => 'El nombre del producto es obligatorio.',
            'quantity.required' => 'La cantidad es obligatoria.',
            'quantity.integer' => 'La cantidad debe ser un número entero.',
            'quantity.min' => 'La cantidad no puede ser negativa.',
            'category_id.required' => 'Debes seleccionar una categoría.',
        ]);

        Product::create($request->only('name', 'quantity', 'category_id'));

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ],
        
        [
        'name.required' => 'El nombre del producto es obligatorio.',
        'quantity.required' => 'La cantidad es obligatoria.',
        'quantity.integer' => 'La cantidad debe ser un número entero.',
        'quantity.min' => 'La cantidad no puede ser negativa.',
        'category_id.required' => 'Debes seleccionar una categoría.',
    ]);

        $product->update($request->only('name', 'quantity', 'category_id'));

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}