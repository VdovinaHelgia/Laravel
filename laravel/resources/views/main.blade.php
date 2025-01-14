<!DOCTYPE html>
<html lang="en" class = "colored">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body style =" background-image: url('{{ asset('img/background.jpg') }}');">
    <div class = "grid-container">
       <img class = "grid-item logo" src = "{{ asset('img/logo.jpg') }}">
       <img class = "grid-item" src = "{{ asset('img/logo-text.svg') }}">
       <a class = "grid-item button" href="{{ route('authentication') }}">Вход</a>
       <a class = "grid-item button" href="{{ route('registration') }}">Регистрация</a>
    </div>
</body>
</html>