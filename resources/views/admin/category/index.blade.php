<x-admin.layouts>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
<a href="/admin/category/create"> Create Category </a>
<table width="900" align="center">
 <tr>
     <td>Id</td>
     <td>Name</td>
     <td>Description</td>
     <td>slug</td>
     <td>Action</td>
 </tr>
    @foreach ($categories as $item)
    <tr>
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{substr($item->description,0,50)}}</td>
    <td>{{$item->slug}}</td>
    <td>
        <a href="#">Edit</a>
        <a href="#">Delete</a>
    </td>
    </tr>
        
    @endforeach
</table>
          </div>
        </div>
    </div>
</x-admin.layouts>