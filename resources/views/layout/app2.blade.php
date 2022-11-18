<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <title>Admin | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app.f76969a3.css') }}">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <x-sidebar />
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        function readURL(input) {
            if (input) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show_image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input);
            }
        }

        $("#preivew").change(function(e) {

            readURL(e.target.files[0]);
        });

        function readURL1(input) {
            if (input) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#edit_show_image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input);
            }
        }
        $("#dropzone-file").change(function(e) {

            readURL1(e.target.files[0]);
        });

        CKEDITOR.replace('summary-ckeditor');
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert', ({
            detail: {
                type,
                message
            }
        }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            const modal = document.querySelector('#modal');
            const getCategory = () => {
                $.ajax({
                    url: '/admin/post/category',
                    method: 'GET',
                    success: function(data) {
                        $("#post-category").html(data);
                    }
                })
            }
            getCategory();


            $("#save").on('submit', function(e) {
                e.preventDefault();
                const category_name = $("#category_name").val();
                if (category_name == "") {
                    Toast.fire({
                        icon: 'success',
                        title: 'Please fill the field'
                    })
                } else {
                    $.ajax({
                        url: '/admin/create/category',
                        method: 'POST',
                        data: {
                            category_name: category_name,
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data == 1) {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Category Create Successfully'
                                })
                                $("#category_name").val("")
                                modal.classList.add('hidden');
                                modal.classList.remove('block');
                                getCategory()
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'some problem'
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
</body>

</html>
