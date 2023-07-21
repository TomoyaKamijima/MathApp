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
            <h1>問題新規作成</h1>
            <form action="/problems" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
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
                    <h2>タイトル</h2>
                    <input type="text" name="problem[title]" placeholder="タイトル" value="{{ old('problem.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('problem.title') }}</p>
                </div>
                <div class="body">
                    <h2>問題</h2>
                    <textarea name="problem[problem]" placeholder="問題文">{{ old('problem.problem') }}</textarea>
                    <p class="problem__error" style="color:red">{{ $errors->first('problem.problem') }}</p>
                </div>
                <div class="body">
                    <h2>解答</h2>
                    <textarea name="problem[answer]" placeholder="解答">{{ old('problem.answer') }}</textarea>
                    <p class="answer__error" style="color:red">{{ $errors->first('problem.answer') }}</p>
                </div>
                <div class="image">
                    <input type="file" name="image">
                </div>
                <input type="submit" value="投稿"/>
            </form>
            <div class="footer">
                <a href="/">一覧に戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>