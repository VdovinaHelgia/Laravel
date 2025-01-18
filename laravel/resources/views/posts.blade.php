<!DOCTYPE html>
<html lang="en" class = "colored">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
   {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/gallery.css') }}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts.css') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Raleway">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    {{--<script src="{{ mix('js\gallery.js') }}"></script>--}}
</head>
<body style =" background-image: url('{{ asset('img/background.jpg') }}');">
    <div class = "grid-container">
        <div class="grid-header">
        <
            <button class="dark-button" id="create-post-button">
                Написать 
                <img src="{{ asset('img/new_post.svg') }}" alt="write post" class="button-icon"> 
            </button>
            @if(Auth::check())
                <div class="user-info">
                    <a href="{{ route('account.index') }}">
                        <img src="{{ Auth::user()->avatar !== 'no' ? asset('storage/' . Auth::user()->avatar) : asset('images/avatar.svg') }}" alt="avatar" class="avatar">
                    </a>
                    <span class="username_head">{{ Auth::user()->username }}</span>
                </div>
            @else
            <button class="light-button" id="login-button">Войти</button>
            @endif
        </div>
        
        @if($posts->isEmpty())
            <p style="color: aliceblue">Нет постов для отображения.</p>
        @else
            @foreach ($posts as $post)
                {{-- <div id="gallery">
                    @if(current($post)==$posts[0])
                        <div class="slide active" id="animation">
                            <div class="grid-container">
                                    <div class="grid-header_post">
                                        <p class="title">{{ $post->title }}</p>
                                        <img src="{{ $post->user->avatar !== 'no' ? asset('storage/' . $post->user->avatar) : asset('images/avatar.svg') }}" alt="avatar" class="avatar">
                                        <p class="username">{{ $post->user->username ?? 'Неизвестный автор' }}</p>
                                    </div>
                                    <p class="time">{{ $post->created_at->addHours(4)->format('H:i d-m-Y') }}</p>
                
                                    <div class="grid-main_post">

                                        <img src="{{ $post->image !== 'no' ? asset('storage/' . $post->image) : asset('images/image_post.png') }}" alt="img"  class="image">
                
                                        <div class="post_button">
                                            <button class="in_post">
                                                <a href="{{ route('post_page', ['id' => $post->id]) }}">
                                                    <img src="{{ asset('img/right_arrow.svg') }}" alt="in post" class="in_post_icon">
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </div> 
                    @else 
                        <div class="slide">--}}
                            <div class="grid-main grid-item">   
                                <div class="grid-container">
                                    <div class="grid-header_post">
                                        <p class="title">{{ $post->title }}</p>
                                        <img src="{{ $post->user->avatar !== 'no' ? asset('storage/' . $post->user->avatar) : asset('images/avatar.svg') }}" alt="avatar" class="avatar">
                                        <p class="username">{{ $post->user->username ?? 'Неизвестный автор' }}</p>
                                    </div>
                                    <p class="time">{{ $post->created_at->addHours(4)->format('H:i d-m-Y') }}</p>
                
                                    <div class="grid-main_post">

                                        <img src="{{ $post->image !== 'no' ? asset('storage/' . $post->image) : asset('images/image_post.png') }}" alt="img"  class="image">
                
                                        <div class="post_button">
                                            {{-- <button class="comments">
                                                <img src="{{ asset('images/comments.svg') }}" alt="comment" class="comment_icon">
                                            </button> --}}
                                            <button class="in_post">
                                                <a href="{{ route('post_page', ['id' => $post->id]) }}">
                                                    <img src="{{ asset('img/right_arrow.svg') }}" alt="in post" class="in_post_icon">
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    {{-- @endif
                </div>--}}
            @endforeach
           {{-- <script src="{{ mix('js\index.js') }}"></script>--}}
        @endif  
    </div>

    <script>
        document.getElementById('login-button').addEventListener('click', function() {
            window.location.href = '/account';
        });
    </script>

    <script>
        document.getElementById('create-post-button').addEventListener('click', function() {
            window.location.href = '/posts-create';
        });
    </script>
</body>
</html>