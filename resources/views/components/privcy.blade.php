<form  class='my-10' wire:submit.prevent='updatePrivcy'>
    <div class="bg-white px-10 pb-10 rounded-lg ">
        <div class="py-3 flex items-center justify-between">
            <h1 class="text-xl font-bold">Privacy & Legal</h1>
            <button class="px-14 rounded text-white my-5 flex  py-2 bg-purple-600" onClick={store}>Update</button>
        </div>
        <div class="my-3 px-10">
            <label htmlFor="" class='text-[#1F2937]'>Privacy Policies</label>
            <textarea  wire:model.lazy="privacy_policies"  cols="30" rows="2" class='py-3 px-2 w-full border my-3 rounded-lg outline-none'></textarea>
        </div>
        <div class="my-3 px-10">
            <label htmlFor="" class='text-[#1F2937]'>Legal Policies    </label>
            <textarea  wire:model.lazy="legal_policies" cols="30" rows="2" class='py-3 px-2 w-full border my-3 rounded-lg outline-none'></textarea>
        </div>
    </div>
</form>