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
            Header
        </x-slot>
        <body>
            <h1 class="title">
                {{ $problem->title }}
            </h1>
            <div class="content">
                <div class="content__problem">
                    <h3>問題</h3>
                    <p>{{ $problem->problem }}</p>
                </div>
                <div>
                    <img src="{{ $problem->image_path }}" alt="画像が読み込めません．"/>
                </div>
                <div class="content__answer">
                    <h3>解答</h3>
                    <p>{{ $problem->answer }}</p>
                </div>
            </div>
            <div class="edit"><a href="/problems/{{ $problem->id }}/edit">編集</a></div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>