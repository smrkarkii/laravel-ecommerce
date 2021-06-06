<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->get();
        return view('admin.product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {   
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {  
        //return $request;

        $validated = $request->validate([
        'product_name'=>'required|max:250|unique:product',
        'product_desc'=>'required',
        'price'=>'required',
        //'category_id'=>'required|integer|min:1',
    ]);
        $product=new Product;
       
        $product->product_name=$request->input('product_name');
        $product->product_desc=$request->input('product_desc');
        $product->price=$request->input('price');
        $product->category_id=$request->input('category_id');
        
        
        if($request->hasfile('image')) {
            $name=$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images',$name);
            $product->image=$name;
         } 
         
        if($product->save()){
            return redirect()->route('product_list');
        }
            else{
                return redirect()->back();
            }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product ,Request $request)

    {
       
        $categories=Category::all();
        return view('admin.product.edit',compact(['product','categories']));
        $validated = $request->validate([
            'product_name'=>'required|max:250',
            'product_desc'=>'required',
            'price'=>'required',
           
        ]);

        if($product->save()){
            return redirect()->route('product_list');
        }
            else{
                return redirect()->back();
            }
        
        
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
