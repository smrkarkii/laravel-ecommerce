<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class SearchController extends Controller
{
   public function search(){
     
       $products=Product::latest();
      if(request('search')!=='')
      {
          $products->where('product_name', 'like','%'.request(['search']).'%')
          ->orwhere('product_desc', 'like','%'.request(['search']).'%');
      }
      
      return view('products',['products'=>$products->get()]);
   }

 
}
