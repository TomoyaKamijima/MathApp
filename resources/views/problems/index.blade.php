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
            <h1>問題一覧</h1>
            <div class='problems'>
                @foreach ($problems as $problem)
                    <div class='problem'>
                        <h2 class='title'>
                            <a href="/problems/{{ $problem->id }}">
                                {{ $problem->title }}
                            </a>
                        </h2>
                        <p class='body'>{{ $problem->problem }}</p>
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
            <textarea id='calPlace'>
            </textarea>
            <p id='calDisplay'>
            </p>
            <button id='calBtn'>表示</button>
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