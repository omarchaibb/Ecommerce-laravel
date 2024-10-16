@extends('layout')

@section('content')
<div class="flex items-center justify-between mb-[2rem]">
  <h2>Procuts</h2>
  <a href={{ route('products.create') }} class="bg-slate-300 p-2 rounded hover:bg-slate-400 hover:text-white transition">Add Product</a>
</div>
<table class="divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">name</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">description</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">quantity</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">image</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">price</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($products as $product)
        <tr class="hover:bg-slate-100 transition">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->name}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->description}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->quantity}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm  ">
              <div class="bg-teal-500 text-center text-white rounded py-[5px] font-bold text-[16px]">
                {{$product->category?->name}}
              </div>
              </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              <img src="{{asset('storage/'. $product->image)}}" alt="product image" width="100" />
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->price}} MAD</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <a href="{{route('products.edit', $product->id)}}" class="text-sm font-medium text-blue-500 hover:bg-cyan-500 transition bg-cyan-600 px-[10px] py-[5px] text-white rounded">Edit</a>
                <form action="{{route('products.destroy', $product->id)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm font-medium text-red-500 hover:bg-red-500 px-[10px] py-[5px] bg-red-600 transition rounded text-white">Delete</button>
                </form>
            </td>
          </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">no products</td>
        </tr>
        @endforelse
    </tbody>
  </table>
@endsection