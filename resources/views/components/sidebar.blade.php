<div class="h-screen hidden lg:block lg:w-[250px] w-0 bg-[#6D44B8] fixed">
    <img src="{{ asset('public/assets/munchtime1.png') }}" alt="" class='mx-auto py-10' />
    <div>
        <ul class=''>
            <a href="{{ route('admin.add.post') }}" class="group"  id="first_icon">
                <li style="margin-top: 4px;" 
                    class="flex px-12 py-5 mr-6 rounded-r-2xl items-center group-hover:my-4 group-hover:bg-white {{ Request::routeIs('admin.add.post') ? 'bg-white' : 'bg-[#6D44B8]' }}">
                    <div class="first_icon" ></div>
                    {{-- {!! Request::routeIs('admin.add.post')
                        ? '<img src="https://vedio-music-player.lanaieka.com/public/assets/add3.png" alt="" class="mr-4" />'
                        : '<img src="https://vedio-music-player.lanaieka.com/public/assets/add2.png" alt="" class="mr-4" />' !!} --}}
                    <span
                        class='text-sm font-bold group-hover:text-[#6D44B8] {{ Request::routeIs('admin.add.post') ? 'text-[#6D44B8]' : 'text-white' }}'>New
                        Post</span>
                </li>
            </a>
            <a href="{{ route('admin.post') }}" class="group" id="second_icon">
                <li style="margin-top: 4px;"
                    class="flex px-12 py-5 mr-6 rounded-r-2xl group-hover:my-4 group-hover:bg-white items-center  {{ Request::routeIs('admin.post') ? 'bg-white' : ' bg-[#6D44B8]' }}">
                    <div class="second_icon"></div>
                    {{-- {!! Request::routeIs('admin.post')
                        ? '<img src="https://vedio-music-player.lanaieka.com/public/assets/post2.png" alt="" style="    margin-left: -5px;" class="mr-4" />'
                        : '<img src="https://vedio-music-player.lanaieka.com/public/assets/post.png" alt="" style="    margin-left: -5px;" class="mr-4" />' !!} --}}
                    <span
                        class="text-sm font-bold mt-[-10px] group-hover:text-[#6D44B8] {{ Request::routeIs('admin.post') ? 'text-[#6D44B8]' : 'text-white' }}">All
                        Posts</span>
                </li>
            </a>
            <a href="{{ route('admin.faq') }}" class="group" id="third_icon">
                <li style="margin-top: 4px;"
                    class="flex px-12 py-5 mr-6 rounded-r-2xl group-hover:my-4 group-hover:bg-white items-center {{ Request::routeIs('admin.faq') ? 'bg-white' : ' bg-[#6D44B8]' }}">
                    {{-- {!! Request::routeIs('admin.faq')
                        ? '<img src="https://vedio-music-player.lanaieka.com/public/assets/faq2.png" alt="" class="mr-4" />'
                        : '<img
                                        src="https://vedio-music-player.lanaieka.com/public/assets/faq.png" alt="" class="mr-4" />' !!} --}}
                                        <div class="third_icon"></div>
                    <span
                        class="text-sm font-bold group-hover:text-[#6D44B8] {{ Request::routeIs('admin.faq') ? 'text-[#6D44B8]' : 'text-white' }}">Faqs</span>
                </li>
            </a>
            <a href="{{ route('admin.feedback') }}" class="group" id="forth_icon">
                <li style="margin-top: 4px;"
                    class="flex px-12 py-5 mr-6 rounded-r-2xl group-hover:my-4 group-hover:bg-white items-center {{ Request::routeIs('admin.feedback') ? 'bg-white' : ' bg-[#6D44B8]' }}">
                    <div class="forth_icon"></div>
                    {{-- {!! Request::routeIs('admin.feedback')
                        ? '<img src="https://vedio-music-player.lanaieka.com/public/assets/layer2.png" alt="" class="mr-4" />'
                        : '<img
                                        src="https://vedio-music-player.lanaieka.com/public/assets/layer.png" alt="" class="mr-4" />' !!} --}}
                    <span
                        class="text-sm font-bold group-hover:text-[#6D44B8] {{ Request::routeIs('admin.feedback') ? 'text-[#6D44B8]' : 'text-white' }}">Feedback</span>
                </li>
            </a>
            <a href={{ route('admin.setting') }} class="group" id="fifth_icon">
                <li style="margin-top: 4px;"
                    class="flex px-12 py-5 mr-6 rounded-r-2xl group-hover:my-4 group-hover:bg-white items-center {{ Request::routeIs('admin.setting') ? 'bg-white' : ' bg-[#6D44B8]' }}">
                    <div class="fifth_icon"></div>
                    {{-- {!! Request::routeIs('admin.setting')
                        ? '<img src="https://vedio-music-player.lanaieka.com/public/assets/group2.png" alt="" class="mr-4" />'
                        : '<img
                                        src="https://vedio-music-player.lanaieka.com/public/assets/group.png" alt="" class="mr-4" />' !!} --}}
                    <span
                        class="text-sm font-bold group-hover:text-[#6D44B8] {{ Request::routeIs('admin.setting') ? 'text-[#6D44B8]' : 'text-white' }}">Settings</span>
                </li>
            </a>
            <a href="#" class="group" id="sixth_icon">
                <li  style="margin-top: 4px;" 
                class='flex px-12 py-5  mr-6 rounded-r-2xl group-hover:my-4 group-hover:bg-white items-center  cursor-pointer'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-6 h-6 mr-4 text-white sixth_icon ">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>

                <livewire:admin.logout>
            </li>
            </a>
        </ul>
    </div>
</div>
<div class="w-full lg:hidden bg-[#6D44B8] fixed z-[999]">
    <div class="container mx-auto max-w-4xl px-20">
        <div class='flex items-center justify-between'>
            <img src="{{ asset('public/assets/munchtime1.png') }}" alt="" class='py-4 w-[100px]' />
            <div class="flex items-center">
                <span ">{{ Auth::user()->username }}</span>
            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" id="togglebtn"
            viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 text-white ml-5 cursor-pointer">
            <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
           </div>
        </div>
        <div class=" hidden fixed bg-[#6D44B8] w-full left-0" id="navbar">
            <div class='container mx-auto max-w-4xl px-20'>
                <ul class=''>
                    <a href="{{ route('admin.add.post') }}" class="group">
                        <li class="flex py-2 rounded-r-2xl items-center {{ Request::routeIs('admin.add.post') ? 'bg-white' : 'bg-[#6D44B8]' }}">
                            <span class='text-sm font-bold group-hover:text-white {{ Request::routeIs('admin.add.post') ? 'text-[#6D44B8]' : 'text-white' }}'>New
                                Post</span>
                        </li>
                    </a>
                    <a href="{{ route('admin.post') }}" class="group">
                        <li class='flex  py-2 rounded-r-2xl items-center {{ Request::routeIs('admin.post') ? 'bg-white' : 'bg-[#6D44B8]' }}'>
                            <span class='text-sm font-bold group-hover:text-white text-white {{ Request::routeIs('admin.post') ? 'text-[#6D44B8]' : 'text-white' }}'>All
                                Posts</span>
                        </li>
                    </a>
                    <a href="" class="group">
                        <li class='flex  py-2 rounded-r-2xl items-center'>
                            <span class='text-sm font-bold group-hover:text-white text-white '>Faqs</span>
                        </li>
                    </a>
                    <a href="" class="group">
                        <li class='flex  py-2 rounded-r-2xl items-center'>
                            <span class='text-sm font-bold group-hover:text-white text-white '>Feedback</span>
                        </li>
                    </a>
                    <a href="" class="group">
                        <li class='flex  py-2 rounded-r-2xl items-center'>
                            <span class='text-sm font-bold group-hover:text-white text-white '>Settings</span>
                        </li>
                    </a>
                    <li onClick={logout} class='flex  py-2 rounded-r-2xl items-center cursor-pointer'>
                            <span class='text-sm font-bold group-hover:text-white text-white '>Logout</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <script>
        const navbar=document.querySelector('#navbar');
        const togglebtn=document.querySelector('#togglebtn');
        togglebtn.addEventListener('click',function(){
            if(navbar.classList.contains('hidden')){
                navbar.classList.add('block');
                navbar.classList.remove('hidden');
            }else{
                navbar.classList.remove('block');
                navbar.classList.add('hidden');
            }
        })
        const home_page=document.querySelector('#home_page');
        home_page.addEventListener('mouseover',function(){
            
        })
    </script>

</div>
