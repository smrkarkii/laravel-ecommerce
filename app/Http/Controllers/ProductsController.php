<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index(Category $category){
        $products=Product::latest()->get();
        return view('home',['products'=>$products]);
    }

      public function show(Product $products,Category $category){
        
          return view('product',['products'=>$products]);
          
      }
}
