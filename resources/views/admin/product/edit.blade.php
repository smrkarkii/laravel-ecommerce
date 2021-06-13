<x-admin.layouts>

    @csrf
    <div class="az-content az-content-dashboard">
       <div class="container">
         <div class="az-content-body">
          @if($errors->any())
          <div class="alert alert danger" style="color:red; background-color:rgb(255, 200, 200);">
           <ul>
               @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
           </ul>
          </div>
     @endif
             <h2>Update Product:{{$product->product_name}}</h2>
             {{-- @can('update-product',$product) --}}
          <form action="{{route('admin.products.update',$product->id)}}" method="POST">
            @method('PUT')
            @csrf
         Product Name: <input type="text" name="product_name" id="" class="form-control" value="{{$product->product_name}}"><br><br>
          Product Desc: <textarea name="product_desc" id="" cols="20" rows="5" class="form-control" value="{{$product->product_desc}}"></textarea><br>
           Price: <input type="text" name="price" id="" class="form-control" value="{{$product->price}}"><br>
            Category: 
            <x-forms.select name="category_id" class="form-control">
   
      
            <option value="0">Select a category</option>
            @foreach ($categories as $category)
             <option value="{{$category->id}}"{{$category->id==$product->category_id? 'selected':""}}>{{$category->name}}</option>
              @endforeach
    

          </x-forms.select><br>
           <input type ="submit" name="Submit" value="Save" class="form-control">
          </form>
          {{-- @else
          You are not authorized user of this product.
          @endcan --}}
        
         </div>
       </div>
    </div>
      
  </x-admin.layouts>