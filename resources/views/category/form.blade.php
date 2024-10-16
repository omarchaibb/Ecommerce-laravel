@extends('layout')
@section('content')
<form action={{ !$isUpdate ? route('categories.store') : route('categories.update',$category->id) }} method="POST" class="p-5 rounded-[10px] bg-slate-100">
    @csrf
    @if ($isUpdate)
    @method('PUT')
    @endif
    <div class="flex items-center gap-[10px]">
        <label for="name" class="text-gray-800 font-bold">Category Name :</label>
        <input type="text" name="name"  placeholder="Category" class="block w-full px-4 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:outline-none focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('name',$category->name) }}">
    </div>
    <button class="bg-blue-500 block m-auto mt-[20px] text-white px-[10px] py-[5px] rounded hover:bg-blue-600 transition">Button</button>
</form>
@endsection
