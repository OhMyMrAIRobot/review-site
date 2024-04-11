<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>@lang('admin/categories.pageAdd')</title>

    <!--css-->
    @vite([
    'resources/css/style.css',
    ])

    <!--icons-->
    <script src="https://kit.fontawesome.com/0cca381f7a.js" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Comfortaa:wght@300..700&family=Lato:wght@300;900&display=swap" rel="stylesheet">

</head>
<body>

<!--HEADER-->
@include('components.Header')

<section class="grid grid-cols-12">
    <div class="col-span-3">
        @include('components.sidebarAdmin')
    </div>

    <div class="col-span-9 flex flex-col items-center gap-y-6 pb-10">
        <h4 class="font-bold text-3xl mt-8">@lang('admin/categories.pageAdd')</h4>

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

        <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data" class="bg-white  py-4 px-6 flex flex-col gap-y-6 h-fit w-1/2 border rounded-xl">
            @csrf

            <div>
                <label for = "title" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/categories.category')</label>
                <input name = "category" id="title" type = "text" placeholder="@lang('admin/categories.category')..." value="{{old('category')}}" class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full p-2.5">
            </div>

            <button type="submit" class="mt-2 mr-auto border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2">@lang('admin/categories.create')</button>
        </form>
    </div>
</section>

@include('components.footer')

</body>
</html>
