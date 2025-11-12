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

            <form action="{{ route('create-post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Title</label>
                <input type="text" name="title" class="w-full p-2 text-black border rounded-md">

                <label>Category</label>
                <!-- <select name="category_id" class="w-full p-2 text-black border rounded-md">

                        <option value="Option 1">Option 1</option>
                        <option value="Option 2">Option 2</option>

                </select> -->

                <label>Content</label>
                <textarea name="content" class="w-full p-2 text-black border rounded-md"></textarea>

                <label>Image</label>
                <input type="file" name="image" class="w-full p-2 text-gray-200 border rounded-md">

                <label>Status</label>
                <select name="status" class="w-full p-2 font-bold text-black border rounded-md">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>

                <button type="submit" class="px-4 py-2 mt-3 text-white bg-blue-500 rounded">
                    Create Post
                </button>
            </form>

            

        </div>
    </div>

</x-app-layout>