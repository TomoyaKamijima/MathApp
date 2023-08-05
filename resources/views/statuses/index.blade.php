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
            <a href='/problems/create'>新規問題作成</a>
            <h1>問題一覧（作成者別）</h1>
            <div class='problems'>
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
                        <form action="/problems/{{ $problem->id }}" id="form_{{ $problem->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteProblem({{ $problem->id }})">削除</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $problems->links() }}
            </div>
            <h2>分野で絞る</h2>
            <div class='categories'>
                @foreach ($categories as $category)
                    <div class='category'>
                        <a href="/categories/{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
            <h2>難易度で絞る</h2>
            <div class='levels'>
                @foreach ($levels as $level)
                    <div class='level'>
                        <a href="/levels/{{ $level->id }}">
                            {{ $level->name }}
                        </a>
                    </div>
                @endforeach
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