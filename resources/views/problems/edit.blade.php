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
                        <h2>分野</h2>
                    <select name="problem[category_id]" value="{{ old('problem.category_id') }}">
                        <option value="">分野を選択してください</option>
                        <option value="1">代数</option>
                        <option value="2">幾何</option>
                        <option value="3">解析</option>
                        <option value="4">確率・統計</option>
                        <option value="5">その他</option>
                    </select>
                    <p class="category_id__error" style="color:red">{{ $errors->first('problem.category_id') }}</p>
                    <h2>難易度</h2>
                    <select name="problem[level_id]" value="{{ old('problem.level_id') }}">
                        <option value="">レベルを選択してください</option>
                        <option value="1">小学校（易）</option>
                        <option value="2">小学校（標準）</option>
                        <option value="3">小学校（難）</option>
                        <option value="4">中学校（易）</option>
                        <option value="5">中学校（標準）</option>
                        <option value="6">中学校（難）</option>
                        <option value="7">高校（易）</option>
                        <option value="8">高校（標準）</option>
                        <option value="9">高校（難）</option>
                        <option value="10">大学・一般（易）</option>
                        <option value="11">大学・一般（標準）</option>
                        <option value="12">大学・一般（難）</option>
                    </select>
                    <p class="level_id__error" style="color:red">{{ $errors->first('problem.level_id') }}</p>
                    <h2>Title</h2>
                        <input type="text" name="problem[title]" placeholder="タイトル" value="{{ $problem->title }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('problem.title') }}</p>
                    </div>
                    <div class="content__body">
                        <h2>Problem</h2>
                        <textarea name="problem[problem]" placeholder="問題文">{{ $problem->problem }}</textarea>
                        <p class="problem__error" style="color:red">{{ $errors->first('problem.problem') }}</p>
                    </div>
                    <div class="content__body">
                        <h2>Answer</h2>
                        <textarea name="problem[answer]" placeholder="解答">{{ $problem->answer }}</textarea>
                        <p class="answer__error" style="color:red">{{ $errors->first('problem.answer') }}</p>
                    </div>
                    <div class="image">
                        <input type="file" name="image">
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