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
            <div class="margin">
                <h1 class="title">問題編集</h1>
                <div>
                    分野と難易度，および画像は再度設定してください．
                </div>
                <div class="content">
                    <form action="/problems/{{ $problem->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="content__title">
                            <h2>Title</h2>
                            <input type="text" name="problem[title]" placeholder="タイトル" value="{{ $problem->title }}" size="67"/>
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
                            <textarea name="problem[problem]" placeholder="問題文" rows="10" cols="67">{{ $problem->problem }}</textarea>
                            <p class="problem__error" style="color:red">{{ $errors->first('problem.problem') }}</p>
                        </div>
                        <div class="image">
                            <input type="file" name="image">
                        </div>
                        <div class="content__body">
                            <h2>解答</h2>
                            <textarea name="problem[answer]" placeholder="解答" rows="10" cols="67">{{ $problem->answer }}</textarea>
                            <p class="answer__error" style="color:red">{{ $errors->first('problem.answer') }}</p>
                        </div>
                        <div class="imageAns">
                            <input type="file" name="imageAns">
                        </div>
                        <div align="center">
                            <input type="submit" value="保存" class="btn"/>
                        </div>
                    </form>
                </div>
                <div class="footer" align="center">
                    <a href="/problems/{{ $problem->id }}">保存せずに問題に戻る</a>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>