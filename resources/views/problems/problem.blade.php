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
            <div class="content">
                <a href="/categories/{{ $problem->category->id }}">{{ $problem->category->name }}</a>
                <a href="/levels/{{ $problem->level->id }}">{{ $problem->level->name }}</a>
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
            <div>
                <a href="/answers/{{ $problem->id }}">解答を見る</a>
            </div>
            <div class="edit"><a href="/problems/{{ $problem->id }}/edit">編集</a></div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>