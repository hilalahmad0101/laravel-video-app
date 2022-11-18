@props(['feedback'])
<div class=' w-full  bg-white px-10 py-5 rounded-xl my-6'>
    <div class='flex items-center justify-between'>
        <div class='text-center'>
            <h1 class="text-md">
                <span class='text-blue-500'>User Name </span>: <span class='ml-10'>{{$feedback->name}}</span>
            </h1>
        </div>
        <div class='text-center mr-52'>
            <h1 class="text-md">
                <span class='text-blue-500'>Email</span>: <span class='ml-10'>{{$feedback->email}}</span>
            </h1>
        </div>
    </div>
    <div class='my-3'>
        <h1 class="text-md flex items-start">
            <span class='w-[166px]'>Feed Back </span>:
            <div class='ml-14 text-justify'>
               {{$feedback->feedback}}</div>
        </h1>
    </div>
</div>