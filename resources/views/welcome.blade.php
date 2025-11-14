@extends('layouts.home')

@section('content')

    <div class="relative flex justify-center w-full">
    
        
            @if (session('success'))
                 <div class="absolute px-5 py-2 mx-auto mt-5 text-lg font-bold text-green-800 bg-green-300 rounded-md success">
                     <h1>{{ session('success') }}</h1>
                </div>
            @endif

    </div>

    <section id="heading">
        <div class="flex flex-col justify-center text-center">
            <h1 class="py-10 text-5xl font-bold">Welcome to <span class="font-normal">Web</span>Blog!</h1>
            <p class="text-2xl">Learn web development, Laravel, React, and more!</p>
            <div class="mx-auto w-80">
            <a href="{{ route('login') }}"><button class="px-2 py-2 mt-3 text-xl bg-gray-200 rounded-md shadow-lg hover:bg-gray-400 hover:shadow-xl hover:shadow-gray-300">Join our community!</button></a>
            </div>
        </div>
    </section>

    <section id="posts">

        <div class="flex justify-between px-10 mt-10">
            <h1 class="text-3xl">View our posts!</h1>
            <form action="{{ route('show-category') }}" method="GET">
                <select name="categories" id="categories" onchange="this.form.submit()" class="text-xl font-semibold text-center bg-gray-200 border-none rounded-md shadow-md cursor-pointer w-60 hover:shadow-gray-300">
                    <option value="">All Posts</option>
                    @forEach ($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($categoryId) && $categoryId == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="grid grid-cols-3 gap-5 px-10">
            <x-postcard :posts="$posts" />
        </div>
    </section>
    

@endsection