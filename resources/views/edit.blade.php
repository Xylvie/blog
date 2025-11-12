@extends('layouts.home')

@section('title', 'Edit Post')

@section('content')

    <div class="w-[40%] border border-gray-300 mt-10 h-auto rounded-md mx-auto">
        <div class="flex justify-between w-full px-5 py-2 shadow-md">
            <h1 class="text-xl font-bold ">{{ $post->title }}<span class="text-lg font-normal">  - {{ $post->user->name }}</span> </h1>
        </div>

        <div class="px-5 py-2">
            <form action="{{ route('save-edit', $post->id) }}" method="POST">
                @csrf
                <textarea name="content" id="content" class="w-full h-auto border-none rounded-md resize-none">{{ old('content', $post->content) }}</textarea>
                <div class="flex justify-between">
                    <button type="submit" class="hover:font-bold hover:text-green-500">Save Changes</button>
                    <a href="{{ route('home') }}" class="hover:font-bold hover:text-red-500">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection

