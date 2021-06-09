<x-admin.layouts>
   <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">
           @if($errors->any())
             <div class="alert alert danger" style="color:red; background-color:rgb(255, 189, 189);">
              <ul>
                  @foreach($errors->all() as $error)
                   <li>{{$error}}</li>
                   @endforeach
              </ul>
             </div>
        @endif

           
         <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
            @csrf
            
            
        Product Name: <input type="text" name="product_name" id="" class="form-control" value="" {{old('product_name')}}><br><br>
        {{-- @error('product_name')
        style="border-color;"
        @enderror --}}
        @error('product_name')
           <div class="alert alert-danger">{{$message}}</div>
          @enderror
         Product Desc: <textarea name="product_desc" id="" cols="20" rows="5" class="form-control" value="" {{old('product_desc')}}></textarea><br>
          Price: <input type="text" name="price" id="" class="form-control" value="" {{old('price')}}><br>
           Category: 
           <x-forms.select name="category_id" class="form-control">
      
           <option value="0">Select a category</option>
           @foreach ($categories as $category)
            <option value="{{$category->id}}" {{$category->id == old('category_id') ? "selected": '' }}>{{$category->name}}</option>
             @endforeach
   
         </x-forms.select><br>
          <input type ="submit" name="Submit" value="Save" class="form-control">
         
         </form>
        </div>
      </div>
   </div>
     
 </x-admin.layouts>