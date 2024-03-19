<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device - width, initial-scale = 1">
    <title>some title</title>

    <!--css-->
    @vite([
        'resources/css/style.css',
        'resources/css/header.css',
        'resources/css/footer.css',
        'resources/css/admin.css',
        'resources/css/adminUsers.css',
        'resources/css/pagination.css',
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
@include('components.adminHeader')

<main class = "admin-container">
    @include('components.sidebarAdmin')

    <div class = "admin-right_cont">
        <div class = "admin_container_header">
            <h2>Управление пользователями</h2>
            <div class = "admin_table_header">
                <div class="admin_table_id">ID</div>
                <div class = "admin_table_login bold">Логин</div>
                <div class = "admin_table_email bold">Email</div>
                <div class = "admin_table_role bold">Роль</div>
                <div class = "admin_table_control bold">Управление</div>
            </div>
        </div>

        @foreach($users as $key => $user)
        <!--USER-->
        <div class = "admin_table_header">
            <div class="admin_table_id">@lang($key + 1)</div>
            <div class = "admin_table_login">@lang($user->username)</div>
            <div class = "admin_table_email">@lang($user->email)</div>
            <div class = "admin_table_role">@lang($user->admin ? 'admin' : 'user')</div>
            <form method="POST" action="{{route('users.destroy', $user->id)}}" class = "admin_table_control">
                @csrf
                @method('DELETE')
                <a class = "admin_table_edit" href = "{{route('users.edit', $user->id)}}">edit</a>
                <button type="SUBMIT" class = "admin_table_delete">delete</button>
            </form>
        </div>
        <!--USER-->
        @endforeach

        <div class = "pagination_main" style="margin-top: 30px">
            {{ $users->onEachSide(7)->links('components.pagination') }}
        </div>
    </div>
</main>

<!--FOOTER-->
@include('components.footer')

</body>
</html>
