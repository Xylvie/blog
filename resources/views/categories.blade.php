<x-app-layout>

    <div class="flex w-full">
        <x-sidebar />


        <div class="flex flex-col px-10 mx-auto my-5 text-gray-200">
            <div class="flex justify-center">
                @if (session('success'))
                    <div class="absolute px-5 py-2 mx-auto mt-5 text-lg font-bold text-green-800 bg-green-300 rounded-md success">
                        <h1>{{ session('success') }}</h1>
                    </div>
                @endif
            </div>

            <form action="{{ route('create-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Name</label>
                <input type="text" name="name" class="w-full p-2 text-black border rounded-md">

                <label>Description</label>
                <textarea name="description" class="w-full p-2 text-black border rounded-md"></textarea>

                <button type="submit" class="px-4 py-2 mt-3 text-white bg-blue-500 rounded">
                    Create Category
                </button>
            </form>

            

        </div>
    </div>

</x-app-layout>