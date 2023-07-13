<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MathApp</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/problems" method="POST">
                @csrf
                @method('PUT')
                <div class="content__title">
                    <h2>User ID</h2>
                    <input type="integer" name="problem[user_id]" placeholder="ユーザID" value="{{ $problem->user_id }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('problem.user_id') }}</p>
                    <h2>Category ID</h2>
                    <input type="integer" name="problem[category_id]" placeholder="カテゴリーID" value="{{ $problem->category_id }}"/>
                    <p class="category_id__error" style="color:red">{{ $errors->first('problem.category_id') }}</p>
                    <h2>Level ID</h2>
                    <input type="text" name="problem[level_id]" placeholder="レベルID" value="{{ $problem->level_id }}"/>
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
                <input type="submit" value="投稿"/>
            </form>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>