@foreach ($posts as $post)
    <div class="w-[40%] border border-gray-300 mt-10 h-auto rounded-md mx-auto">
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
            <p>{{ $post->excerpt }}</p>
        </div>
    </div>
@endforeach