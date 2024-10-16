@extends('layout')
@section('title','Categories')

@section('content')
<div class="flex items-center justify-between mb-[2rem]">
    <h2>Categories</h2>
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
        @forelse ($categories as $category)
        <tr class="hover:bg-slate-100 transition">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$category->id}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$category->name}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <a href={{ route('categories.show',$category->id) }} class="text-sm font-medium text-white hover:bg-green-500 transition bg-green-600 px-[10px] py-[5px] text-white rounded">Show</a>
                <a href={{ route('categories.edit',$category->id) }} class="text-sm font-medium text-blue-500 hover:bg-cyan-500 transition bg-cyan-600 px-[10px] py-[5px] text-white rounded">Edit</a>
                <form action={{ route('categories.destroy',$category->id) }} method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm font-medium text-red-500 hover:bg-red-500 px-[10px] py-[5px] bg-red-600 transition rounded text-white">Delete</button>
                </form>
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