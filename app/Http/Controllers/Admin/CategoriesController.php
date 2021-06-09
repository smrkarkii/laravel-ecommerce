<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories=Category::latest()->get();
        return view('admin/category/index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories=Category::all();
       return view('admin/category/create',compact('categories'));
    

        // $category=new Category;
        // $category->name=$request->input('name');
        // $category->description=$request->input('description');
        // $category->slug=$request->input('slug');
        // $category->category_id=$request->input('category_id');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|max:250|unique:categories',
            'description'=>'required',
            
            //'category_id'=>'required|integer|min:1',
        ]);
            $slug=strtolower(str_replace(' ','-',$request->input('name')));
            $category=new category;
           
            $category->name=$request->input('name');
            $category->description=$request->input('description');
            $category->slug=$request->input('slug');
            $category->parent_id=$request->input('parent_id');
            $category->slug=$slug;
            $category->save();
        
            if($category->save()){
                return redirect()->route('category_list');
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
    public function edit($id)
    {
        //
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
        //
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
