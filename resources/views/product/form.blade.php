@extends('layout')
@section('content')
<div class="w-[60%] m-auto">
  @if ($errors->any())
  <ul class="bg-red-100 rounded-md ">
    <h2 class="font-bold text-red-600 ml-[2rem]">Error</h2>
    @foreach ($errors->all() as $error)
        <li class="text-red-400 opacity-[0.9] ml-[4rem] list-disc">{{$error}}</li>
    @endforeach

  </ul>
  @endif

</div>
<form id = "form" class="w-3/4 flex items-center flex-col bg-slate-50 rounded-lg m-auto" method="POST" action={{ $isUpdate ? route("products.update",$product->id):route("products.store") }} enctype="multipart/form-data">
    @csrf
    @if ($isUpdate)
        @method("PUT")
    @endif
    
    <div class="space-y-12 w-3/4 p-3 ">
      <div class="border-b border-gray-900/10 pb-12 w-full">
        {{-- Product Name  --}}
          <div class="sm:col-span-3">
            <label for="name" class="block text-sm  font-medium leading-6 text-gray-900">Product Name</label>
            <div class="mt-2">
              <input type="text" name="name" id="name" autocomplete="name" value='{{ old("name",$product->name) }}' class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:outline-none focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
        {{-- Product Price  --}}
          <div class="sm:col-span-3">
            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
            <div class="mt-2">
              <input type="text" name="price" id="price" autocomplete="price" value = '{{old("price",$product->price)}}'' class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:outline-none focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
        {{-- Product Name  --}}
          <div class="sm:col-span-3">
            <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">Quantity</label>
            <div class="mt-2">
              <input type="text" name="quantity" id="quantity" autocomplete="quantity" value = "{{old('quantity',$product->quantity)}}"  class="block w-full px-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:outline-none focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
            <div class="mt-2">
              <select name="category_id" id="category" class="w-full ring-1 rounded-md p-[5px]">
                <option value=""> Choose category</option>
                @foreach ($categories as $category)
                <option @selected(old('category_id',$product->category_id == $category->id)) value={{$category->id}}>{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            {{-- discription  --}}
          <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">discription</label>
            <div class="mt-2">
              <textarea 
              id="about" 
              name="description" rows="3" 
              class="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 focus:outline-none">{{old("description",$product->description)}}</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the product.</p>
          </div>
          
        {{-- image  --}}
          <div class="col-span-full">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                  @if ($product->image)
                  <img src={{asset("storage/".$product->image)}} width='100px' alt="">
                  @else
                  <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                  </svg>
                @endif
                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload a file</span>
                    <input id="file-upload" name="image" type="file" class="sr-only">
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{$isUpdate ? "update" : "Add"}}</button>
    </div>
  </form>
  @endsection
