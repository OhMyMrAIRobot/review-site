<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>{{$shop->title}}</title>

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
@include('components.header')

<section class="grid grid-cols-12">
    <div class="col-span-3">
        @include('components.sidebarAdmin')
    </div>

    <div class="col-span-9 flex flex-col items-center gap-y-6 pb-10">
        <h4 class="font-bold text-3xl mt-8">@lang('admin/shops.titleEdit')</h4>

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

        <form method="POST" action="{{route('shops.update', $shop->id)}}" enctype="multipart/form-data" class="bg-white  py-4 px-6 flex flex-col gap-y-6 h-fit w-1/2 border rounded-xl">
            @csrf
            @method('PUT')
            <div>
                <label for = "title" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/shops.title')</label>
                <input name = "title" id="title" type = "text" placeholder="@lang('admin/shops.title')..." value="{{$shop->title}}" class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full p-2.5">
            </div>

            <div>
                <label for = "desc" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/shops.description')</label>
                <textarea name="description" id="desc" placeholder="@lang('admin/shops.description')..." class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full h-24 p-2.5"
                >{{$shop->description}}</textarea>
            </div>

            <div>
                <input type="hidden" name="img" value="{{$shop->img}}">
                <label for="file" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/shops.img')</label>
                <input type="file" name="new_img" id="file" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 outline-none focus:ring-indigo-800 focus:border-indigo-600 disabled:opacity-50 disabled:pointer-events-none
                    file:bg-gray-50 file:border-0
                    file:me-4
                    file:py-2 file:px-4" value="{{old('img')}}">
            </div>

            <div>
                <label for="category" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/shops.category')</label>
                <select name = "category_id" id="category" class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block px-2.5 py-2">
                    @if ($shop->category_id)
                        <option value="{{$shop->category_id}}" selected>@lang($categories[$shop->category_id])</option>
                    @else
                        <option value="-1" selected>@lang('admin/shops.category')</option>
                    @endif
                    @foreach($categories as $key => $category)
                        @if (!$shop->category_id)
                            <option value="{{$key}}">@lang($category)</option>
                        @elseif ($categories[$shop->category_id] !== $category)
                            <option value="{{$key}}">@lang($category)</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/shops.contact')</label>
                <div class="grid grid-cols-2 gap-x-12 gap-y-8">
                    <div class="w-full flex gap-x-2 items-center">
                        <label for = "fb"><i class="text-xl fab fa-facebook"></i></label>
                        <input id = "fb" name = "facebook" type = "text" placeholder="Facebook" value="{{$shop->facebook}}" class="border-b outline-none px-2 text-sm w-full focus:ring-indigo-800 focus:border-indigo-600">
                    </div>

                    <div class="w-full flex gap-x-2 items-center">
                        <label for="inst"><i class="text-xl fab fa-instagram"></i></label>
                        <input id = "inst" name = "instagram" type = "text" placeholder="Instagram" value="{{$shop->instagram}}" class="border-b outline-none px-2 text-sm w-full focus:ring-indigo-800 focus:border-indigo-600">
                    </div>

                    <div class="w-full flex gap-x-2 items-center">
                        <label for = "tg"><i class="text-xl fab fa-telegram"></i></label>
                        <input id = "tg" name = "telegram" type = "text" placeholder="Telegram" value="{{$shop->telegram}}" class="border-b outline-none px-2 text-sm w-full focus:ring-indigo-800 focus:border-indigo-600">
                    </div>

                    <div class="w-full flex gap-x-2 items-center">
                        <label for = "vk"><i class="text-xl fab fa-vk"></i></label>
                        <input id = "vk" name = "vk" type = "text" placeholder="Vk" value="{{$shop->vk}}" class="border-b outline-none px-2 text-sm w-full focus:ring-indigo-800 focus:border-indigo-600">
                    </div>

                    <div class="w-full flex gap-x-2 items-center">
                        <label for = "phone"><i class="text-xl fas fa-phone"></i></label>
                        <input id = "phone" name = "phone" type = "text" placeholder="Phone" value="{{$shop->phone}}" class="border-b outline-none px-2 text-sm w-full focus:ring-indigo-800 focus:border-indigo-600">
                    </div>

                    <div class="w-full flex gap-x-2 items-center">
                        <label for="email"><i class="text-xl fas fa-envelope"></i></label>
                        <input name = "email" id = "email" type = "email" placeholder="Example@mail.com" value="{{$shop->email}}" class="border-b outline-none px-2 text-sm w-full focus:ring-indigo-800 focus:border-indigo-600 ">
                    </div>
                </div>
            </div>

            <button type="submit" class="mt-2 mr-auto border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2">@lang('admin/shops.save')</button>
        </form>

    </div>
</section>

{{--<main class = "admin-container">--}}
{{--    @include('components.sidebarAdmin')--}}

{{--    <div class = "admin-right_cont">--}}

{{--        <form method="POST" action="{{route('shops.update', $shop->id)}}" class = "admin_container_header" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}
{{--            <h2>Добавить магазин</h2>--}}

{{--            <input value="@lang($shop->title)" name = "title" class = "shopName_input" type = "text" placeholder="Название...">--}}

{{--            <div class = "shop_desc_container">--}}
{{--                <h5>Описание</h5>--}}
{{--                <textarea name="description" placeholder="Описание..." class = "desc_text">@lang($shop->description)</textarea>--}}
{{--            </div>--}}

{{--            <h5>Изображение</h5>--}}
{{--            <div class = "select_shop_img_container">--}}
{{--                <input type="hidden" name="img" value="{{$shop->img}}">--}}
{{--                <input name = "new_img" type="file" class="select_img_input">--}}
{{--            </div>--}}

{{--            <h5>Категория</h5>--}}
{{--            <select name = "category_id" class = "select_category" name="topic" aria-label="Default select example">--}}
{{--            </select>--}}

{{--            <h5>Контактная информация</h5>--}}
{{--            <div class = "contact_container">--}}
{{--                <div class = "contact">--}}
{{--                    <i class="icon fab fa-facebook"></i>--}}
{{--                    <input value="@lang($shop->facebook)" name = "facebook" class = "contact_input" type = "text">--}}
{{--                </div>--}}

{{--                <div class = "contact">--}}
{{--                    <i class="icon fab fa-instagram"></i>--}}
{{--                    <input value="@lang($shop->instagram)" name = "instagram" class = "contact_input" type = "text">--}}
{{--                </div>--}}

{{--                <div class = "contact">--}}
{{--                    <i class="icon fab fa-telegram"></i>--}}
{{--                    <input value="@lang($shop->telegram)" name = "telegram" class = "contact_input" type = "text">--}}
{{--                </div>--}}

{{--                <div class = "contact">--}}
{{--                    <i class="icon fab fa-vk"></i>--}}
{{--                    <input value="@lang($shop->vk)" name = "vk" class = "contact_input" type = "text">--}}
{{--                </div>--}}

{{--                <div class = "contact">--}}
{{--                    <i class="icon fas fa-phone"></i>--}}
{{--                    <input value="@lang($shop->phone)" name = "phone" class = "contact_input" type = "text">--}}
{{--                </div>--}}

{{--                <div class = "contact">--}}
{{--                    <i class="icon fas fa-envelope"></i>--}}
{{--                    <input value="@lang($shop->email)" name = "email" class = "contact_input" type = "text">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <button type="SUBMIT" class = "admin_btn_add">Сохранить</button>--}}
{{--        </form>--}}

{{--    </div>--}}
{{--</main>--}}


<!--FOOTER-->
@include('components.footer')

</body>
</html>
