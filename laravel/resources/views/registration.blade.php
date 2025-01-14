<!DOCTYPE html>
<html lang="en" class = "colored">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body style =" background-image: url('{{ asset('img/background.jpg') }}');">
    <div class = "grid-container">
    
        <img class = "grid-item logo" src = "{{ asset('img/logo.jpg') }}">
        <img class = "grid-item" src = "{{ asset('img/logo-text.svg') }}">

        <form class = "grid-item" method = "post" action = "">
                @csrf
                <p><input type="text" name="login" placeholder="Логин" size="12" class = "input"/></p>
                <p><input type="text" name="email" placeholder="Почта" size="12" class = "input"/></p>
                <p><input type="password" name="password" placeholder="Пароль" size="12" maxlength="11" class = "input"/></p>
                <p><input type="password" name="repeatePassword" placeholder="Повторите пароль" size="12" maxlength="20" class = "input"/></p>
                <p><input type="text" name="username" placeholder="Имя пользователя" size="12" maxlength="30" class = "input"/></p>
                <p><button type="submit" class = "grid-item reg">Зарегистрироваться</button></p>
            </form>

            <a class = "grid-item reg" href="{{ route('main') }}">Назад</a>

            @if ($errors -> any())
                <div class = "grid-item error">
                    <ul>
                        @foreach($errors -> all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    </div>
</body>
</html>