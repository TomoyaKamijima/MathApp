<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MathApp</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>App name</h1>
        <div class='problems'>
            <a href='/problems/create'>新規問題作成</a>
            @foreach ($problems as $problem)
                <div class='problem'>
                    <h2 class='title'>
                        <a href="/problems/{{ $problem->id }}">{{ $problem->title }}</a>
                    </h2>
                    <p class='body'>{{ $problem->problem }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $problems->links() }}
        </div>
    </body>
</html>