@extends('layouts.home')

@section('content')
    <div class="flex justify-center">
                @if (session('success'))
                    <div class="absolute px-5 py-2 mx-auto mt-5 text-lg font-bold text-green-800 bg-green-300 rounded-md success">
                        <h1>{{ session('success') }}</h1>
                    </div>
                @endif
            </div>

<div class="max-w-4xl p-5 mx-auto">
    <h1 class="text-3xl font-bold">{{ $posts->title }}</h1>
    <p class="mb-4 text-gray-500">By {{ $posts->user->name }} | Category: {{ $posts->category?->name }}</p>

    @if($posts->image)
        <img src="{{ asset('storage/' . $posts->image) }}" alt="{{ $posts->title }}" class="mb-4 rounded-lg">
    @endif

    <div class="prose">
        {!! nl2br(e($posts->content)) !!}
    </div>

    <form action="{{ route('comment', $posts->id) }}" method="POST" class="mt-6">
        @csrf
        <textarea name="content" class="w-full p-2 border rounded resize-none" placeholder="Add a comment..." required></textarea>
        <button type="submit" class="px-4 py-2 mt-2 text-white bg-blue-500 rounded">Submit</button>
    </form>

    <h2 class="mt-8 text-xl font-bold">Comments</h2>

    <div class="mt-4">
        @foreach($posts->comments as $comment)
            <div class="p-4 mb-4 border rounded">
                <div class="flex justify-between">
                    <p class="font-bold">{{ $comment->user? $comment->user->name : $comment->author_name }}</p>
                    @if (auth()->check() && auth()->id() === $comment->user_id || (is_null($comment->user_id) && auth()->check() && auth()->id() === $posts->user->id))
                        <div class="flex gap-2">
                            <form action="{{ route('delete-comment', $comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="hover:font-bold">Delete</button>
                            </form>
                        </div>
                        
                    @endif
                </div>

                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
