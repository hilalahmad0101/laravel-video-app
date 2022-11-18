@extends('layout.app2')

@section('title')
    Add Post
@endsection

@section('content')
    <x-category-modal />
    <div class="lg:ml-[250px] ml-0">
        <div class='bg-[#EDF2FF] '>
            <div class='container  mx-auto '>
                <div class="py-3 px-10 flex items-center justify-between bg-[#F7AF36]">
                    <h1 class="text-xl font-bold text-white">
                        Update Post
                    </h1>
                    <h1 class="text-xl font-bold flex items-center">
                        <span class="mr-5 text-white">{{ Auth::user()->username }}</span>
                        <img class="p-1 w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                            src="{{asset('assets/logo.jpeg')}}" alt="Bordered avatar">
                    </h1>
                </div>
                <form method='post' enctype='multipart/form-data' class=" px-10 my-10"
                    action="{{ route('admin.update.post', ['id' => $posts->id]) }}">
                    @csrf
                    <div class="bg-white py-9 rounded-lg ">
                        <div class="my-3 px-10 grid md:grid-cols-2 grid-cols-1 gap-8">
                            <div class="my-3 ">
                                <label htmlFor="" class='text-[#1F2937]'>Add News Title</label>
                                <input type="text" name="title" id="" value='{{ $posts->title }}'
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
                                @error('title')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="my-3 ">
                                <div class="flex justify-between items-center">
                                    <label htmlFor="" class='text-[#1F2937]'>Select Category</label>
                                    <button id='show'><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </div>
                                <select name="cat_id" id="post-category"
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none'>
                                </select>
                            </div>
                        </div>
                        <div class="my-3 px-10 grid md:grid-cols-2 grid-cols-1 gap-8">
                            <div class=' '>
                                <label htmlFor="" class='text-[#1F2937]'>Add Tag or Highlight</label>
                                <input type="text" name="tags" id="" value='{{ $posts->tags }}'
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
                                @error('tags')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=''>
                                <label htmlFor="" class='text-[#1F2937] ml-[106px]'>Add Images/Thumbnail</label>
                                <div class="flex justify-center items-center w-full mt-3">
                                    <label htmlFor="dropzone-file"
                                        class="flex  flex-col justify-center items-center rounded-lg border-2 border-[#1877F2] border-dashed cursor-pointer    dark:border-[#1877F2] dark:hover:border-[#1877F2] w-[50%]">
                                        <div class="flex flex-col justify-center items-center py-3 px-2  ">
                                            <p class="mb-2 text-sm text-gray-500 ">
                                                <img src="{{ asset('storage') }}/{{ $posts->images }}" alt=""
                                                    id="edit_show_image" />
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                                Drag and Drop or Browser
                                            </p>
                                        </div>
                                        <input id="dropzone-file" type="file" name="new_files" class="hidden" />
                                        <input type="hidden" name="old_images" value="{{ $posts->images }}" id="">
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="my-3 px-10">
                            <label htmlFor="" class='text-[#1F2937]'>New Body</label>
                            <textarea class="form-control" id="summary-ckeditor" name="content"> {{ $posts->description }}</textarea>
                            @error('content')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="my-3 px-10 grid md:grid-cols-2 grid-cols-1 gap-8">
                            <div>
                                <label htmlFor="" class='text-[#1F2937]'>Posting Time</label>
                                <input type="time" name="posting_time" id="" value='{{ $posts->pending_time }}'
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
                                @error('posting_time')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label htmlFor="" class='text-[#1F2937]'>Posting Date</label>
                                <input type="date" name="posting_date" id="" value='{{ $posts->pending_date }}'
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
                                @error('posting_date')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class='ml-9 flex items-center'>
                                <input type="checkbox" class='h-5 w-5' {{ $posts->notification ? 'checked' : '' }}
                                    name="notification" id="" />
                                @error('notification')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <span class='ml-4 text-md'>Send Push Notification of this post</span>
                            </div>
                        </div>
                    </div>
                    <div class='flex justify-end'>
                        <button class="px-7 rounded text-white my-5 flex  py-3 bg-purple-600">Add Post</button>
                    </div>
                    <CategoryModal modal={modal} setModal={setModal} getCategory={getCategories} />
                </form>
            </div>
        </div>
    </div>


    <script>
        const show = document.querySelector('#show');
        const close = document.querySelector('#close');
        const modal = document.querySelector('#modal');
        show.addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.remove('hidden');
            modal.classList.add('block');
        })
        close.addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.add('hidden');
            modal.classList.remove('block');
        })
    </script>
@endsection
