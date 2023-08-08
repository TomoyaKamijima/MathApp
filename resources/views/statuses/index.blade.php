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
                <div class='problems'>
                    <a href='/problems/create' class='new'>新規問題作成</a>
                    <h1>問題一覧（作問者別）</h1>
                    @foreach ($problems as $problem)
                        <div class='problem'>
                            <h2 class='title'>
                                <a href="/problems/{{ $problem->id }}">
                                    {{ $problem->title }}
                                </a>
                            </h2>
                            <a href="/categories/{{ $problem->category->id }}">{{ $problem->category->name }}</a>
                            <a href="/levels/{{ $problem->level->id }}">{{ $problem->level->name }}</a>
                            <p>
                                作問者：<a href="/statuses/{{ $problem->user->id }}">{{ $problem->user->name }}</a>
                            </p>
                            @auth
                            @if ($problem->user_id===Auth::id())
                            <form action="/problems/{{ $problem->id }}" id="form_{{ $problem->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div align="right">
                                    <button type="button" onclick="deleteProblem({{ $problem->id }})">削除</button>
                                </div>
                            </form>
                            @endif
                            @endauth
                        </div>
                    @endforeach
                </div>
                <div class='paginate'>
                    {{ $problems->links() }}
                </div>
                <div class='categories'>
                    <h2>分野で絞る</h2>
                    @foreach ($categories as $category)
                        <div class='category'>
                            <a href="/categories/{{ $category->id }}">
                                {{ $category->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class='levels'>
                    <h2>難易度で絞る</h2>
                    @foreach ($levels as $level)
                        <div class='level'>
                            <a href="/levels/{{ $level->id }}">
                                {{ $level->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
                @auth
                <div class='favorites'>
                    <h2>お気に入り</h2>
                    <div class='favorite'>
                        <a href="/favorites/{{ Auth::id() }}">
                            お気に入り
                        </a>
                    </div>
                </div>
                @endauth
            </div>
            <script>
                function deleteProblem(id) {
                    'use strict'
                    
                    if (confirm('削除すると復元できません．\n本当に削除しますか？')) {
                        //console.log(document.getElementById(`form_${id}`));
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </body>
    </x-app-layout>
</html>