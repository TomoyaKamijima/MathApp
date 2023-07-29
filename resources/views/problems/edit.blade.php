<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MathApp</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            作問の森
        </x-slot>
        <body>
            <h1 class="title">問題編集</h1>
            <div class="content">
                <form action="/problems/{{ $problem->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="content__title">
                        <h2>Title</h2>
                        <input type="text" name="problem[title]" placeholder="タイトル" value="{{ $problem->title }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('problem.title') }}</p>
                    </div>
                    <div class="category">
                        <h2>分野</h2>
                        <select name="problem[category_id]">
                            <option value="">分野を選択してください</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <p class="category_id__error" style="color:red">{{ $errors->first('problem.category_id') }}</p>
                    </div>
                    <div class="level">
                        <h2>難易度</h2>
                        <select name="problem[level_id]">
                            <option value="">難易度を選択してください</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                        <p class="level_id__error" style="color:red">{{ $errors->first('problem.level_id') }}</p>
                    </div>
                    <div class="content__body">
                        <h2>問題</h2>
                        <textarea name="problem[problem]" placeholder="問題文">{{ $problem->problem }}</textarea>
                        <p class="problem__error" style="color:red">{{ $errors->first('problem.problem') }}</p>
                    </div>
                    <div class="image">
                        <input type="file" name="image">
                    </div>
                    <div class="content__body">
                        <h2>解答</h2>
                        <textarea name="problem[answer]" placeholder="解答">{{ $problem->answer }}</textarea>
                        <p class="answer__error" style="color:red">{{ $errors->first('problem.answer') }}</p>
                    </div>
                    <div class="imageAns">
                        <input type="file" name="imageAns">
                    </div>
                    <input type="submit" value="投稿"/>
                </form>
            </div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>