@props(['categories'])
<div id="modal" wire:ignore.self class="bg-black/70 absolute h-screen w-full top-0 left-0 hidden translate-x">
    <div id="defaultModal"
        class=" items-center justify-center overflow-y-auto h-screen  overflow-x-hidden flex top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Faq
                    </h3>
                    <button id="close" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form wire:submit.prevent='store'>
                    @csrf
                    <div class="p-6 space-y-6">
                        <div class='grid grid-cols-1'>
                            <div class=''>
                                <div>
                                    <label htmlFor="" class='text-[#1F2937]'>Select Category</label>
                                    <select wire:model.lazy="cat_id" id=""
                                        class='py-3 px-2 w-full border my-3 rounded-lg outline-none'>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class='grid grid-cols-2 gap-4'>
                            <div>
                                <label htmlFor="" class='text-[#1F2937]'>Enter Question</label>
                                <input type="text" wire:model.lazy="question" id=""
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none ' />
                                @error('question')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label htmlFor="" class='text-[#1F2937]'>Enter Answer</label>
                                <input type="text" wire:model.lazy="answer" id=""
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none ' />
                                @error('answer')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600 justify-center">
                        <button type="submit"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="modal2" wire:ignore.self class="bg-black/70 absolute h-screen w-full top-0 left-0 hidden translate-x">
    <div id="defaultModal"
        class=" items-center justify-center overflow-y-auto h-screen  overflow-x-hidden flex top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Update Faq
                    </h3>
                    <button id="close_edit" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form wire:submit.prevent='update'>
                    @csrf
                    <div class="p-6 space-y-6">
                        <div class='grid grid-cols-1'>
                            <div class=''>
                                <div>
                                    <label htmlFor="" class='text-[#1F2937]'>Select Category</label>
                                    <select wire:model.lazy="edit_cat_id" id=""
                                        class='py-3 px-2 w-full border my-3 rounded-lg outline-none'>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='grid grid-cols-2 gap-4'>
                            <div>
                                <label htmlFor="" class='text-[#1F2937]'>Enter Question</label>
                                <input type="text" wire:model.lazy="edit_question" id=""
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none ' />
                            </div>
                            <div>
                                <label htmlFor="" class='text-[#1F2937]'>Enter Answer</label>
                                <input type="text" wire:model.lazy="edit_answer" id=""
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none ' />
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600 justify-center">
                        <button type="submit"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
