@extends ('layout.app')

@section ('content')
    <div class="articles">
        @foreach ($articles as $article)
            <a class="article" href="{{ $article->path() }}">
                <div class="article__wrapper">
                    <div class="article__img-wr">
                        <img class="article__img" src="{{ $article->image }}" alt=""/>
                    </div>
                    <div class="article__main-info">
                        <div class="article__title">
                            {{ $article->title }}
                        </div>
                        <div class="article__body">
                            {!! $article->prettyBody() !!}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
