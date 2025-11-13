<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    
        <header class="flex items-center justify-between px-20 py-3 bg-blue-200">
            <div id="logo">
                <a href="{{ route('home') }}" class="text-3xl font-bold"><span class="font-normal">Web</span>Blog</a>
            </div>

            <nav class="flex gap-3 text-xl">

                @if (auth()->check())
                    <a href="{{ route('dashboard') }}" class="px-4 py-1 rounded-md hover:font-bold hover:bg-blue-300">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-1 rounded-md hover:font-bold hover:bg-blue-300">Log-out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-1 rounded-md hover:font-bold hover:bg-blue-300">Log-in</a>
                @endif
                
            </nav>
        </header>

        <main class="w-full pb-20">
            @yield('content')
        </main>
    
        <!-- <footer class="flex justify-center">Joshua Neri</footer> -->
</body>
</html>