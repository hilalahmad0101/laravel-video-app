<div>
    <x-slot name='title'>Faq</x-slot>
    <div class="lg:ml-[250px] ml-0">
        <div class='bg-[#EDF2FF]'>
            <div class='container  mx-auto '>
                <div class="py-3  px-10 flex items-center justify-between bg-[#F7AF36]">
                    <h1 class="text-xl font-bold text-white">
                        Frequently asked questions
                    </h1>
                    <h1 class="text-xl font-bold ">
                       
                            <div class="flex items-center">
                                <span class="mr-5 text-white">{{ Auth::user()->username }}</span>
                                <img class="p-1 w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                                    src="{{asset('assets/logo.jpeg')}}" alt="Bordered avatar">
                            </div>
                            
                    </h1>
                  
                </div>
              <div class="flex justify-end  px-10">
                <button class="px-14 rounded text-white my-5 flex  py-2 bg-purple-600" id='show'>Add
                    New</button>
              </div>
            </div>
            <div class="my-10 pb-10  px-10">
                <div class='flex w-full items-center px-10'>
                    <div class='w-72 text-[#06152B]/50'>Category</div>
                    <div class='w-60 flex items-center'>
                        <span class='mr-2 text-[#06152B]/50'>Question</span> <img src="{{ asset('public/assets/arrow.png') }}"
                            alt="" />
                    </div>
                    <div class='w-96 flex items-center'><span class='mr-2 text-[#06152B]/50'>Answer</span> <img
                            src="{{ asset('public/assets/arrow.png') }}" alt="" /></div>
                    <div class='text-[#06152B]/50'>Actions</div>
                </div>
                @foreach ($faqs as $faq)
                    <x-all-faq :faq=$faq />
                @endforeach
            </div>
            <x-faq-modal :categories=$categories />
        </div>
    </div>
    <script></script>
</div>
