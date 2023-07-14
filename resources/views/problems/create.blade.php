<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MathApp</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            Header
        </x-slot>
        <body>
            <h1>Problem Name</h1>
            <form action="/problems" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2>User ID</h2>
                    <input type="integer" name="problem[user_id]" placeholder="ユーザID" value="{{ old('problem.user_id') }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('problem.user_id') }}</p>
                    <h2>Category ID</h2>
                    <input type="integer" name="problem[category_id]" placeholder="カテゴリーID" value="{{ old('problem.category_id') }}"/>
                    <p class="category_id__error" style="color:red">{{ $errors->first('problem.category_id') }}</p>
                    <h2>Level ID</h2>
                    <input type="text" name="problem[level_id]" placeholder="レベルID" value="{{ old('problem.level_id') }}"/>
                    <p class="level_id__error" style="color:red">{{ $errors->first('problem.level_id') }}</p>
                    <h2>Title</h2>
                    <input type="text" name="problem[title]" placeholder="タイトル" value="{{ old('problem.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('problem.title') }}</p>
                </div>
                <div class="body">
                    <h2>Problem</h2>
                    <textarea name="problem[problem]" placeholder="問題文">{{ old('problem.problem') }}</textarea>
                    <p class="problem__error" style="color:red">{{ $errors->first('problem.problem') }}</p>
                </div>
                <div class="body">
                    <h2>Answer</h2>
                    <textarea name="problem[answer]" placeholder="解答">{{ old('problem.answer') }}</textarea>
                    <p class="answer__error" style="color:red">{{ $errors->first('problem.answer') }}</p>
                </div>
                <div class="image">
                    <input type="file" name="image">
                </div>
                <input type="submit" value="投稿"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>