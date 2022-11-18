<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <title>Admin | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('public/build/assets/app.f76969a3.css') }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- @vite('resources/css/app.css') --}}
    @livewireStyles

    <style>
        .first_icon {
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/add2.png');
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }

        #first_icon:hover  li .first_icon{
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/add3.png') !important;
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }
        .second_icon {
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/post.png');
            width: 30%;
            height: 4.5vh;
            background-repeat: no-repeat;
        }

        #second_icon:hover  li .second_icon{
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/post2.png') !important;
            width: 30%;
            height: 4.5vh;
            background-repeat: no-repeat;
        }
        .third_icon {
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/faq.png');
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }

        #third_icon:hover  li .third_icon{
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/faq2.png') !important;
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }
        .forth_icon {
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/layer.png');
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }

        #forth_icon:hover  li .forth_icon{
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/layer2.png') !important;
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }
        .fifth_icon {
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/group.png');
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }

        #fifth_icon:hover  li .fifth_icon{
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/group2.png') !important;
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }

        #sixth_icon:hover  li .sixth_icon{
           color: purple !important;
        }

        .active{
            background-image: url('https://vedio-music-player.lanaieka.com/public/assets/add3.png') !important;
            width: 30%;
            height: 3vh;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <x-sidebar />
    {{ $slot }}
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            modal1.classList.add('hidden');
            modal1.classList.remove('block');
            modal2.classList.add('hidden');
            modal2.classList.remove('block');
        });


        const show = document.querySelector('#show');
        const show_edit = document.querySelector('#show_edit');
        const close = document.querySelector('#close');
        const close_edit = document.querySelector('#close_edit');
        const modal = document.querySelector('#modal');
        const modal2 = document.querySelector('#modal2');
        show.addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.remove('hidden');
            modal.classList.add('block');
        })
        show_edit.addEventListener('click', function(e) {
            e.preventDefault();
            modal2.classList.remove('hidden');
            modal2.classList.add('block');
        })

        close.addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.add('hidden');
            modal.classList.remove('block');


        })
        close_edit.addEventListener('click', function(e) {
            e.preventDefault();
            modal2.classList.add('hidden');
            modal2.classList.remove('block');

        })

        // const modal1 = document.querySelector('#modal');
        // const modal2 = document.querySelector('#modal2');
        // const Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top',
        //     showConfirmButton: false,
        //     showCloseButton: true,
        //     timer: 5000,
        //     timerProgressBar: true,
        //     didOpen: (toast) => {
        //         toast.addEventListener('mouseenter', Swal.stopTimer)
        //         toast.addEventListener('mouseleave', Swal.resumeTimer)
        //     }
        // });

        // window.addEventListener('alert', ({
        //     detail: {
        //         type,
        //         message
        //     }
        // }) => {
        //     Toast.fire({
        //         icon: type,
        //         title: message
        //     })
        //     modal1.classList.add('hidden');
        //     modal1.classList.remove('block');
        //     modal2.classList.add('hidden');
        //     modal2.classList.remove('block');
        // })
    </script>
</body>

</html>
