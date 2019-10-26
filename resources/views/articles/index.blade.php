@extends ('layout.app')

@section ('content')
    <div class="articles">
        @foreach ($articles as $article)
            <a class="article" href="/articles/{{ $article->code }}">
                <div class="articles__wrapper">
                    <div class="article__title">
                        {{ $article->title }}
                    </div>
                    <div class="article__body">
                        {{ $article['short_description'] }}<br><br>
                        {{ $article['body'] }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
