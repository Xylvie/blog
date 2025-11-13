<x-app-layout>

    <div class="flex w-full">
        <x-sidebar />

        <div class="flex flex-col mx-auto">
            <h1 class="mt-10 text-3xl font-bold text-gray-200">You are logged in to BlogWeb Admin Dashboard!</h1>
            <p class="mt-10 text-xl font-bold text-center text-gray-200">In this Panel you can create your Blog post, add Categories, and Tags!</p>

            <div id="buttons" class="flex justify-between mt-20">
                <a href="{{ route('posts') }}" class="px-20 py-5 text-xl font-bold bg-green-500 border border-gray-300 rounded-md hover:bg-green-300">Add New post</a>
                <a href="{{ route('add-category') }} " class="px-20 py-5 text-xl font-bold bg-green-500 border border-gray-300 rounded-md hover:bg-green-300">Add New Categories</a>
            </div>
        </div>
    </div>
    
</x-app-layout>
