@extends('layout')
@section('content')
<div class="flex items-center justify-between mb-[2rem]">
    <h2>Products with category 
        <span class="bg-cyan-400 ml-2 text-slate-50 rounded px-[15px] py-1">
            {{$category->name}}
        </span>
    </h2>
    <a href={{ route('categories.create') }} class="bg-slate-300 p-2 rounded hover:bg-slate-400 hover:text-white transition">Add Category</a>
</div>

<table class="divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">name</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>

      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($products as $product)
        <tr class="hover:bg-slate-100 transition">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->id}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->name}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <a href={{ route('products.edit',$product->id) }} class="text-sm font-medium text-blue-500 px-[20px] hover:bg-cyan-500 transition bg-cyan-600 px-[10px] py-[5px] text-white rounded">Edit</a>
            </td>
          </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No Category</td>
        </tr>
        @endforelse
    </tbody>
  </table>
@endsection