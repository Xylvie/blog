<x-app-layout>

    <div class="flex w-full">
        <x-sidebar />

        <div class="flex flex-col mx-auto">
            <h1 class="mt-10 text-3xl font-bold text-black">You are logged in to BlogWeb Admin Dashboard!</h1>
            <p class="mt-10 text-xl font-bold text-center text-black">In this Panel you can create your Blog post, add Categories, and Tags!</p>

            <div id="buttons" class="flex flex-col justify-between gap-5 mt-10">
                <a href="{{ route('posts') }}" class="px-20 py-5 text-xl font-bold text-center bg-blue-200 border border-gray-300 rounded-md shadow-md hover:bg-green-300 shadow-gray-800">Add New post</a>
                <a href="{{ route('add-category') }} " class="px-20 py-5 text-xl font-bold text-center bg-blue-200 border border-gray-300 rounded-md shadow-md hover:bg-green-300 shadow-gray-800">Add New Categories</a>
                <a href="{{ route('home') }}" class="px-20 py-5 text-xl font-bold text-center bg-blue-200 border border-gray-300 rounded-md shadow-md hover:bg-green-300 shadow-gray-800">Home</a>
            </div>
        </div>
    </div>
    
</x-app-layout>
