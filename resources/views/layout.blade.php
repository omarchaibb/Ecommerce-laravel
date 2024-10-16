<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>@yield('title') | Ecommerce</title>
</head>
<body>
    <nav class="flex gap-[2rem] justify-center bg-slate-300 h-[39px] items-center text-black mb-[30px]">
        <a href={{ route('products.index') }} class="bg-slate-300 p-2 rounded hover:bg-slate-400 hover:text-white transition">all Products</a>
        <a href={{ route('category.index') }} class="bg-slate-300 p-2 rounded hover:bg-slate-400 hover:text-white transition">Categories</a>
    </nav>

    <div class="flex flex-col px-[100px]">
        @yield('content')
    </div>
</body>
</html>