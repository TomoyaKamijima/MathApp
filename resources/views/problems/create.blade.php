    <x-app-layout>
        <x-slot name="header">
            作問の森
        </x-slot>
            <h1>問題新規作成</h1>
            <form action="/problems" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="problem[title]" placeholder="タイトル" value="{{ old('problem.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('problem.title') }}</p>
                </div>
                <div class="category">
                    <h2>分野</h2>
                    <select name="problem[category_id]">
                        <option value="">分野を選択してください</option>
                        @foreach($categories as $category)
                            @if(old('problem.category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
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
                <div class="body">
                    <h2>問題</h2>
                    <textarea name="problem[problem]" placeholder="問題文">{{ old('problem.problem') }}</textarea>
                    <p class="problem__error" style="color:red">{{ $errors->first('problem.problem') }}</p>
                </div>
                <div class="image">
                    <input type="file" name="image">
                </div>
                <div class="body">
                    <h2>解答</h2>
                    <textarea name="problem[answer]" placeholder="解答">{{ old('problem.answer') }}</textarea>
                    <p class="answer__error" style="color:red">{{ $errors->first('problem.answer') }}</p>
                </div>
                <div class="imageAns">
                    <input type="file" name="imageAns">
                </div>
                <input type="submit" value="投稿"/>
            </form>
            <div class="footer">
                <a href="/">一覧に戻る</a>
            </div>
            <textarea id="textarea" rows="10" cols="50"></textarea>
            <p id="txt"></p>
            <button id="btn" type="button">表示</button>
            <button id="clear" type="button">クリア</button>
            <script src="{{ asset('/js/cal.js') }}"></script>
    </x-app-layout>