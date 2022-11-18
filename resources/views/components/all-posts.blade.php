@props(['post'])
<div class='flex w-full items-center justify-between bg-white p-4 rounded-2xl my-6'>
    <div class='text-center'>
        <img src="{{ asset('storage') }}/{{$post->images}}" class='w-20 h-20' alt="" />
    </div>
    <div class='text-center'>
        <h1 class="text-md">{{$post->title}}</h1>
    </div>
    <div class='text-center'>
        <h1 class="text-md">
            <span class='ml-2'>{{$post->tags}}</span>
        </h1>
    </div>
    <div class='text-center'>
        <button wire:click='delete({{$post->id}})' class='px-7 py-2 bg-red-400/80 rounded-full text-white font-semibold mr-10'>Delete</button>
        <a href="{{ route('admin.edit.post', ['id'=>$post->id]) }}">
            <button class='px-9 py-2 bg-green-400/80 rounded-full text-white font-semibold'>Edit</button>
        </a>
    </div>
</div>