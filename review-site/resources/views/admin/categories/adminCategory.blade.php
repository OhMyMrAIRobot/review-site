<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>admin categories</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/footer.css',
        'resources/css/admin.css',
        'resources/css/adminCategory.css',
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

<main class = "admin-container">
    @include('components.sidebarAdmin')
    <div class = "admin-right_cont">
        <div class = "admin_btn_container">
            <a class = "admin_btn_add"
               href = {{route('categories.create')}}
            >Добавить</a>
        </div>

        <div class = "admin_container_header">
            <h2>Управление категориями</h2>
            <div class = "admin_table_header">
                <div class="admin_table_id">ID</div>
                <div class = "admin_table_name bold">Название</div>
                <div class = "admin_table_control bold">Управление</div>
            </div>
        </div>

        @foreach($categories as $key => $category)
        <!--Category-->
        <div class = "admin_table_header">
            <div class="admin_table_id">@lang($key++)</div>
            <div class = "admin_table_name">@lang($category->category)</div>
            <form action="{{route('categories.destroy', $category->id)}}" method="POST" class = "admin_table_control">
                @csrf
                @method('DELETE')
                <a href="{{route('categories.edit', $category->id)}}" class = "admin_table_edit">edit</a>
                <button type="SUBMIT" class = "admin_table_delete">delete</button>
            </form>
        </div>
        <!--Category-->
        @endforeach

    </div>
</main>


<!--FOOTER-->
@include('components.footer')

</body>
</html>
