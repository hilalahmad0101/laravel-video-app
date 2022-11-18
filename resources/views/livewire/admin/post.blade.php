<div>
    <x-slot name='title'>Post</x-slot>
    <div class="lg:ml-[250px] ml-0">
        <div class='bg-[#EDF2FF] '>
            <div class='container  mx-auto'>
                <div class="py-3 px-10 flex items-center justify-between bg-[#F7AF36]">
                    <h1 class="text-xl font-bold text-white">
                        All Post
                    </h1>
                    <h1 class="text-xl font-bold flex items-center">
                        <span class="mr-5 text-white">{{Auth::user()->username}}</span>
                        <img class="p-1 w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{asset('assets/logo.jpeg')}}" alt="Bordered avatar">
                    </h1>
                </div>
                <div class="my-10 pb-10 px-10">
                    <div class='flex w-full items-center px-10'>
                        <div class='w-40 text-[#06152B]/50'>Thumbnail</div>
                        <div class='w-60 flex items-center'><span class='mr-2 text-[#06152B]/50'>Title</span> <img
                                src="{{ asset('public/assets/arrow.png') }}" alt="" />
                        </div>
                        <div class='w-96 flex items-center'><span class='mr-2 text-[#06152B]/50'>Highlight</span>
                            <img src="{{ asset('public/assets/arrow.png') }}" alt="" />
                        </div>
                        <div class='text-[#06152B]/50'>Action</div>
                    </div>

                    @foreach ($posts as $post)
                        <x-all-posts :post=$post />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
