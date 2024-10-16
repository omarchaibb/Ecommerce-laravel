<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->with('category')->get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $isUpdate = false;
        $categories = Category::all();
        $product = new Product();
        $product->fill([
            'quantity' => 0,
            'price' => 200,
        ]);
        return view('product.form',compact('isUpdate','product','categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $formFields = $request->validated();
        $formFields['image'] = $request->file('image')->store('product','public');
        Product::create($formFields);
        return to_route('products.index')->with('success' , 'product added seccessfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $isUpdate = true;
        $categories = Category::all();
        return view('product.form', compact('product', 'isUpdate','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $formFields = $request->validated();

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('product','public');
        }
        $product->fill($formFields)->save();
        return to_route('products.index')->with('success' , 'product added seccessfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('success','deleted succussfulty');
    }
}
