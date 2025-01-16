<!DOCTYPE html>
<html lang="en" class = "colored">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Post</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/page_post.css') }}"/>
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body style =" background-image: url('{{ asset('img/background.jpg') }}');">
    <div class = "grid-container">

    
        
        <a href="{{ route('posts') }}" class="all_post">
            <img src="{{ asset('images/left_arrow.svg') }}" alt="all post" class="all_post_icon">
        </a>

        <div class = "grid-item">
            <p class="post_title">{{ $post->title }}</p>
            @if($post->image !== 'no')
                <img src="{{ asset('storage/' . $post->image) }}" alt="post image" class="post_img">
            @endif
            <p class="post_body">{{ $post->body }}</p>
        </div>

        <p class=" grid-item comment_title">Комментарии:</p>

        <div class="grid-container">
            @foreach($comments as $comment)
            <div class="grid-item all_comments">
                <div class="comment">
                    <div class="grid-container">
                        <div class="grid-header_comment">
                            <img src="{{ asset('storage/' . $comment->user->avatar ?? '') }}" alt="avatar" class="avatar">
                            <p class="username">{{ $comment->user->username }}</p>
                            <p class="time">{{ $comment->created_at->addHours(4)->format('H:i d-m-Y') }}</p>
                        </div>
        
                        <div class="grid-main_comment">
                            <p class="body">{{ $comment->body }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <form class="grid-item create_comment" method="post" action="/comment_check">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}"> <!-- Скрытое поле для post_id -->
            <div class="textarea-container">
                <textarea name="body" rows="3" cols="50" placeholder="Напишите комментарий ..."></textarea>
            </div>
            <button class="in_post">
                <img src="{{ asset('images/right_arrow.svg') }}" alt="in post" class="in_post_icon">
            </button>
        </form>


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