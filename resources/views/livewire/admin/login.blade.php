<div>
    <x-slot name='title'>Login</x-slot>
    <div class="bg-[#EDF2FF] h-screen w-full flex items-center">
        <div class="container mx-auto max-w-lg">
            <div class="shadow-md bg-white rounded-3xl">
                <div class="text-center flex justify-center">
                    <img src="{{ asset('public/assets/munch-time.png') }}" alt="" class='my-10' />
                </div>
                <div class='text-center  pb-10'>
                    <h1 class="text-[24px] font-[700]">Admin Login</h1>
                </div>
                <div class="mx-20 pb-10">
                    <form wire:submit.prevent='login'>
                        <div>
                            <input type="text" name='username' wire:model.lazy="username"
                                class='w-full outline-none border-b-2  px-3 border-[#A6A6A6]'
                                placeholder='Enter Username' id="" />

                            @error('username')
                                <spant class="text-red-500">{{ $message }}</spant>
                            @enderror
                        </div>
                        <div class='my-10'>
                            <input type="password" name='password' wire:model.lazy="password"
                                class='w-full outline-none border-b-2  px-3 border-[#A6A6A6]'
                                placeholder='Enter Password' id="" />
                            @error('password')
                                <spant class="text-red-500">{{ $message }}</spant>
                            @enderror
                        </div>
                        <div class='text-center'>
                            <button type="submit"
                                class='px-14 py-3 rounded-md bg-[#6D44B8] text-[20px] text-white font-[700] hover:bg-[#7654b6]'>Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
