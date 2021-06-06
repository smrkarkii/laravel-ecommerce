<x-admin.layouts>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
<a href="/admin/product/create"> Create Product </a>
<table width="900" align="center">
 <tr>
     <td>Id</td>
     <td>Name</td>
     <td>Product Description</td>
     <td>Price</td>
     <td>Action</td>
 </tr>
    @foreach ($products as $item)
    <tr>
    <td>{{$item->id}}</td>
    <td>{{$item->product_name}}</td>
    <td>{{substr($item->product_desc,0,50)}}</td>
    <td>{{$item->price}}</td>
    <td>
        <a href="/admin/product/edit/{{$item->id}}">Edit</a>
        <a href="#">Delete</a>
    </td>
    </tr>
        
    @endforeach
</table>
          </div>
        </div>
    </div>
</x-admin.layouts>