<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MathApp</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            作問の森
        </x-slot>
        <body>
            <h1 class="title">
                {{ $problem->title }}
            </h1>
            <a href="/categories/{{ $problem->category->id }}">{{ $problem->category->name }}</a>
            <a href="/levels/{{ $problem->level->id }}">{{ $problem->level->name }}</a>
            <div class="content">
                <div class="content__problem">
                    <h3>問題</h3>
                    <p>{{ $problem->problem }}</p>
                </div>
                @if($problem->image_path)
                <div>
                    <img src="{{ $problem->image_path }}" alt="画像が読み込めません．"/>
                </div>
                @endif
                <div class="content__answer">
                    <h3>解答</h3>
                    <p>{{ $problem->answer }}</p>
                </div>
                @if($problem->image_pathAns)
                <div>
                    <img src="{{ $problem->image_pathAns }}" alt="画像が読み込めません．"/>
                </div>
                @endif
            </div>
            <div class="edit"><a href="/problems/{{ $problem->id }}/edit">編集</a></div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
            <h2>質問</h2>
            <form action="/answers/{{ $problem->id }}" method="POST">
                @csrf
                <div class="message">
                    <h3>質問・回答</h3>
                    <textarea name="message[message]" placeholder="質問・回答を入力"></textarea>
                </div>
                <input type="submit" value="送信"/>
            </form>
            <h2>チャットログ</h2>
            <div class='chats'>
                @foreach ($messages as $message)
                    <div class='message'>
                        <p class="message">
                            {{ $message->message }}
                        </p>
                    </div>
                @endforeach
            </div>
        </body>
    </x-app-layout>
</html>