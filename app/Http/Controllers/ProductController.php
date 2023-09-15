<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request ->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ],[
            'name.required' => "Name is required",
            'desc.required' => "Description is required",
            'price.required' => "Price is required",
            'stock.required' => "Stock is required",
            
        ]);

        try{
            Product::create($validate);

            return redirect(route('product.index'))->withSuccess('Product Has Been Added!');
        } catch (\Throwable $th){
            return back()->withErrors('something went wrong!');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)    
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.update', compact('products'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validate = $request ->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ],[
            'name.required' => "Name is required",
            'desc.required' => "Description is required",
            'price.required' => "Price is required",
            'stock.required' => "Stock is required",
            
        ]);
        try{
            Product::create($validate);
                
            return redirect(route('product.index'))->withSuccess('Product Has Been Added!');
        } catch (\Throwable $th){
            return back()->withErrors('something went wrong!');

        }
    
        // Find the product by ID
        $product = Product::find($id);
    
        if (!$product) {
            // Handle the case where the product is not found (e.g., show an error)
            return redirect()->route('product.index')->withError('Product not found.');
        }
    
        // Update the product with the validated data
        $product->update($validate);
    
        // Redirect to the product index page with a success message
        return redirect()->route('product.index')->withSuccess('Product updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
 

    
     public function destroy(Product $product)
     {
         // Check if the product exists
         if (!$product) {
             return redirect()->route('product.index')->with('error', 'Product not found.');
         }
     
         // Delete the product
         $product->delete();
     
         // Redirect to a success page with a success message
         return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
     }
    
    
}
