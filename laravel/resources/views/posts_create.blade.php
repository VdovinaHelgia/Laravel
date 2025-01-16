<!DOCTYPE html>
<html lang="en" class = "colored">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Posts</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts-create.css') }}"/>
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body style =" background-image: url('{{ asset('img/background.jpg') }}');">
    <div class = "grid-container">
    
        <form class = "grid-item" method = "post" action = "/posts-create/check">
            @csrf
            <p class="bt-center">
                <button type="submit" class="dark-button">
                    <img src="{{ asset('images/save_post.svg') }}" alt="save" class="button-icon"> 
                </button>

                <button type="button" id="save_img" class="dark-button">
                    <img src="{{ asset('images/save_image_for_post.svg') }}" alt="save img" class="button-icon"> 
                </button>
            </p>
            <p id="fileName"></p>
            <input type="file" id="imgInput" accept="image/*" style="display: none;" />
            <p><input type="text" name="title" placeholder="title" size="18" class = "input-field"/></p>
            {{-- <p><input type="text" name="body" placeholder="text text text" size="18" class = "input-field"/></p> --}}
            <textarea name="body" rows="20" cols="50"  placeholder="Введите ваше сообщение здесь..."></textarea>
        </form>

        <form method = "get" action = "posts">
            <button class="all_post">
                <img src="{{ asset('images/left_arrow.svg') }}" alt="all post" class="all_post_icon">
            </button>
        </form>

        {{-- <div id="success-message_img"></div> --}}
        {{-- сообщение что данные обновлены --}}
        @if(session('success')) 
            <div id="success-message" style="color: aliceblue" class="alert alert-success">
                Пост успешно создан!
                <img src="{{ asset('images/post_saved.svg') }}" alt="post_saved" class="button-icon-saved"> 
            </div>
        @endif

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


    <script>
        // Проверяем, есть ли сообщение об успехе
        window.onload = function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                // Устанавливаем таймер на 5 секунд (5000 миллисекунд)
                setTimeout(function() {
                    successMessage.style.display = 'none'; // Скрываем сообщение
                }, 5000);
            }
        };
    </script>

    {{-- Загрузка изображения --}}
    <script>
        document.getElementById('save_img').addEventListener('click', function() {
            document.getElementById('imgInput').click();
        });
    
        document.getElementById('imgInput').addEventListener('change', function() {
            const file = this.files[0];
    
            if (file) {
                const formData = new FormData();
                formData.append('img', file);
                formData.append('user_id', '{{ $user->id }}'); // Добавляем ID пользователя
                formData.append('_token', '{{ csrf_token() }}'); // Добавляем CSRF токен
    
                // Отображаем название выбранного файла
                document.getElementById('fileName').innerText = file.name;
    
                fetch('/upload-img', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    // const successMessage = document.getElementById('success-message_img');

                    // if (data.success) {
                    //     // Устанавливаем текст сообщения
                    //     successMessage.innerHTML = 'Изображение успешно загружено!';

                    //     // Добавляем класс для показа сообщения с анимацией
                    //     successMessage.classList.add('show');

                    //     // Убираем класс через 5 секунд, чтобы скрыть сообщение
                    //     setTimeout(function() {
                    //         successMessage.classList.remove('show'); // Убираем класс
                    //     }, 5000);
                    // }
                })
                .catch(error => console.error('Ошибка:', error));
            }
        });
    </script>
</body>
</html>