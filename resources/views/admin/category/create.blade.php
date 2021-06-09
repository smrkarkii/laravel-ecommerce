<x-admin.layouts>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2>Create Category</h2>
            <form action="{{route('categories_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                Category Name: <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                @error('name')
                    style="border-color: red;"
                @enderror
                >
                <br><br>
                Category Desc: <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea> <br><br>
                Parent Category: 
              
                <x-forms.select name="parent_id" class="form-control">
                    <option value="0">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('parent_id') ? "selected": '' }}>{{ $category->name }}</option>
                    @endforeach
                </x-forms.select><br><br>
              
                <input type="submit" name="submit" value="Save" class="form-control">
            </form>
          </div>
        </div>
    </div>
</x-admin.layouts>
