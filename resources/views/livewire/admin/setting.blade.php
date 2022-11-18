<div>
    <x-slot name='title'>Settings</x-slot>
    <div class="lg:ml-[250px] ml-0 lg:mt-0 mt-10">
        <div class='bg-[#EDF2FF] '>
            <div class=''>
                <div class="py-3 px-10 flex items-center justify-between bg-[#F7AF36]">
                    <h1 class="text-xl font-bold text-white">
                        Settings
                    </h1>
                    <h1 class="text-xl font-bold flex items-center">
                        <span class="mr-5 text-white">{{Auth::user()->username}}</span>
                        <img class="p-1 w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{asset('assets/logo.jpeg')}}" alt="Bordered avatar">
                    </h1>
                </div>
                <div class="my-10 pb-10 px-10">
                    <x-per-link :icons=$icons />
                    <x-privcy />
                    <x-change-password />
                </div>
            </div>
        </div>
    </div>
</div>
