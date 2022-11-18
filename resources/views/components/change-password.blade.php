<form class='my-10' wire:submit.prevent='changePassword'>
    <div class="bg-white px-10 py-10 rounded-lg ">
        <div class="py-3">
            <h1 class="text-xl font-bold">Admin Password Change </h1>
        </div>
        <div class="my-3 px-10 grid grid-cols-2 gap-8">
            <div>
                <label htmlFor="" class='text-[#1F2937]'>Admin User Id</label>
                <input type="text" readOnly name="id" value="{{Auth::user()->username}}" class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
            </div>
            <div>
                <label htmlFor="" class='text-[#1F2937]'>Old Password</label>
                <input type="password"  wire:ignore.self="old_password" class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
            </div>
        </div>
        <div class="my-3 px-10 grid grid-cols-2 gap-8">
            <div>
                <label htmlFor="" class='text-[#1F2937]'>New Password</label>
                <input type="password"  wire:ignore.self="new_password" class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
            </div>
            <div>
                <label htmlFor="" class='text-[#1F2937]'>Confirm Password</label>
                <input type="password"  wire:ignore.self="c_password" class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-14 rounded text-white my-5 flex  py-2 bg-purple-600">Update</button>

        </div>
    </div>
</form>