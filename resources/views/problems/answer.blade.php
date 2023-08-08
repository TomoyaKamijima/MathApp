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
            <div class="margin">
                <div class="content">
                    <h1 class="title">
                        {{ $problem->title }}
                    </h1>
                    <a href="/categories/{{ $problem->category->id }}">{{ $problem->category->name }}</a>
                    <a href="/levels/{{ $problem->level->id }}">{{ $problem->level->name }}</a>
                    <p>
                        作問者：<a href="/statuses/{{ $problem->user->id }}">{{ $problem->user->name }}</a>
                    </p>
                </div>
                
                <form action="/answers/{{ $problem->id }}" method="POST" align="right">
                    @csrf
                    <input type="submit" name="favorite" value="お気に入り登録" class="btn"/>
                </form>
                
                <div class="problem">
                    <div class="content__problem">
                        <h3>問題</h3>
                        <p>{{ $problem->problem }}</p>
                    </div>
                    @if($problem->image_path)
                    <div>
                        <img src="{{ $problem->image_path }}" alt="画像が読み込めません．"/>
                    </div>
                    @endif
                </div>
                <div class="problem">
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
                @auth
                @if ($problem->user_id===Auth::id())
                <div class="edit" align="center"><a href="/problems/{{ $problem->id }}/edit">編集</a></div>
                @endif
                @endauth
                <div class="footer" align="center">
                    <a href="/">一覧に戻る</a>
                </div>
                <h2>コメント</h2>
                <form action="/answers/{{ $problem->id }}" method="POST">
                    @csrf
                    <div class="message">
                        <h3>コメントを送る</h3>
                        <textarea name="message[message]" placeholder="コメントを入力" rows="2" cols="67"></textarea>
                    </div>
                    <div align="right">
                        <input type="submit" name="question" value="送信" class="btn"/>
                    </div>
                </form>
                <h2>コメント履歴</h2>
                <div class='chats'>
                    @foreach ($messages as $message)
                        @if($problem->id===$message->problem_id)
                        <div class='message'>
                            <p>
                                {{ $message->user->name }}さん {{ $message->created_at }}
                            </p>
                            <p class="message">
                                {{ $message->message }}
                            </p>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </body>
    </x-app-layout>
</html>