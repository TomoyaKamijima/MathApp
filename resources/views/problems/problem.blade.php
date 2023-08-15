<x-app-layout>
    <x-slot name="header">
        作問の森
    </x-slot>
    <div class="margin">
        <h1 class="title">
            {{ $problem->title }}
        </h1>
        <div class="content">
            <a href="/categories/{{ $problem->category->id }}">{{ $problem->category->name }}</a>
            <a href="/levels/{{ $problem->level->id }}">{{ $problem->level->name }}</a>
            <p>
                作問者：<a href="/statuses/{{ $problem->user->id }}">{{ $problem->user->name }}</a>
            </p>
        </div>
        <div class="problem">
            <div class="content__problem">
                <h3>問題</h3>
                <p>{{ $problem->problem }}</p>
            </div>
            @if($problem->image_path)
            <div>
                <img src="{{ $problem->image_path }}" alt="画像が読み込めません．"/>
            </div>
            @endif
        </div>
        <div align="center">
            <a href="/answers/{{ $problem->id }}">解答を見る</a>
        </div>
        @auth
        @if ($problem->user_id===Auth::id())
        <div class="edit" align="center"><a href="/problems/{{ $problem->id }}/edit">編集</a></div>
        @endif
        @endauth
        <div class="footer" align="center">
            <a href="/">一覧に戻る</a>
        </div>
    </div>
</x-app-layout>