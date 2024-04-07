<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>Feedback reply</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
    ])
    <link rel="stylesheet" href = "{{asset('cssTest/test.css')}}">
    <!--icons-->
    <script src="https://kit.fontawesome.com/0cca381f7a.js" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Comfortaa:wght@300..700&family=Lato:wght@300;900&display=swap" rel="stylesheet">

</head>
<body>

<!--HEADER-->
@include('components.header')

<section class="grid grid-cols-12">
    <div class="col-span-3">
        @include('components.sidebarAdmin')
    </div>

    <div class="col-span-9 flex flex-col items-center gap-y-6 pb-10">
        <h4 class="font-bold text-3xl mt-8">Message</h4>
        @if (session('status_err') || $errors->any())
            <div class="w-1/2">
                @if (session('status_err'))
                    @component('components.success', ['status' => session('status_ok')])@endcomponent
                @endif
                @foreach ($errors->all() as $error)
                    @component('components.error', ['status' => $error])@endcomponent
                @endforeach
            </div>
        @endif

        <div class="w-1/2 border rounded-xl p-4 text-gray-500">
            {{$feedback->description}}
        </div>

        <h4 class="font-bold text-3xl">Reply message</h4>
        <form method="POST" action="{{route('feedback.send')}}" class="bg-white py-3 h-fit w-1/2 border rounded-xl">
            @csrf
            <input type="hidden" name = "sender" value="{{\Illuminate\Support\Facades\Auth::user()->getUsername()}}">
            <div class="flex items-center">
                <label class="pl-4 font-bold pb-2" for="email">Receiver: </label>
                <input name="email" id="email" placeholder="To" readonly
                       class="text-base text-gray-500 w-full border-none outline-none pb-2 px-4" value="{{$feedback->email}}">
            </div>

            <div>
                <label for="title"></label>
                <input name="title" id="title" placeholder="Title..."
                       class="text-base w-full font-bold border-none outline-none pb-2 px-4" value="{{old('title')}}">
            </div>

            <div>
                <label for="text"></label>
                <textarea name='text' id="text" placeholder="Write a description"
                          class="text-sm w-full resize-none border-b mt-2 h-32 outline-none px-4 "
                >{{old('description')}}</textarea>
            </div>

            <div class="w-full flex justify-between px-4 items-center">
                <button class="border rounded px-2 py-1 bg-indigo-600 text-white hover:bg-indigo-700 text-center"
                        type="submit">
                    Send
                </button>
            </div>
        </form>
    </div>

</section>

@include('components.footer')
