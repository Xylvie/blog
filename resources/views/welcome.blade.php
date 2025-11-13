@extends('layouts.home')

@section('content')

    <div class="relative flex justify-center w-full">
    
        
            @if (session('success'))
                 <div class="absolute px-5 py-2 mx-auto mt-5 text-lg font-bold text-green-800 bg-green-300 rounded-md success">
                     <h1>{{ session('success') }}</h1>
                </div>
            @endif

    </div>

    <div class="grid grid-cols-3 gap-5 px-20">


        <x-postcard :posts="$posts" />


    </div>

@endsection