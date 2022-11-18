@props(['faq'])
<div
    class='flex w-full items-center justify-between bg-white p-4 rounded-xl my-6 md:overflow-x-hidden overflow-x-scroll '>
    <div class='text-center flex items-center'>
        <img src="{{ asset('public/assets/play.png') }}" class='w-14 h-14' alt="" />
        <span class='ml-4'>{{ $faq->categories->category_name }}</span>
    </div>
    <div class='text-center'>
        <h1 class="text-md">{{ $faq->question }}</h1>
    </div>
    <div class='text-center'>
        <h1 class="text-md">{{ $faq->answer }}</h1>
    </div>
    <div class='text-center'>
        <button type="button" wire:click="delete({{ $faq->id }})"
            class='px-7 py-2 bg-red-400/80 rounded-full text-red-600 font-semibold mr-10'>Delete</button>

        <button type="button" wire:click="edit({{ $faq->id }})" id='show_edit' class='px-9 py-2 bg-green-400/80 rounded-full text-green-700 font-semibold'>Edit</button>

    </div>
</div>
