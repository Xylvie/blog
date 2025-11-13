@foreach ($posts as $post)
    <div class="w-full h-auto mx-auto mt-10 border border-gray-300 rounded-md">
        <p class="px-5 py-2">Category: {{ $post->category?->name }}</p>
        <div class="flex justify-between w-full px-5 py-2 shadow-md">
            <h1 class="text-xl font-bold ">{{ $post->title }}<span class="text-lg font-normal">  - {{ $post->user->name }}</span> </h1>
                

            @if (auth()->check() && auth()->id() === $post->user_id)
                <div class="flex gap-2">
                    <a href="{{ route('edit-post', $post->id)  }}" class="hover:font-bold">Edit</a>
                    <form action="{{ route('delete-post', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="hover:font-bold">Delete</button>
                    </form>
                </div>
                
            @endif
            
        </div>

        <div class="px-5 py-2">
            <p class="w-full h-12 text-wrap">{{ $post->excerpt }}</p>
            <div class="flex justify-center mt-10">
                <img src="{{ asset('storage/' . $post->image) }}" alt="" class="object-cover w-full h-64 rounded-md w-50">
            </div>
        </div>

        <div class="flex justify-end p-5">
            <a href="{{ route('posts.show', $post->slug) }}" class="hover:underline hover:text-blue-500">View More -></a>
        </div>
    </div>
@endforeach