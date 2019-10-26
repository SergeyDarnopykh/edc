@extends ('layout.app')

@section ('content')
    <div class="article">
        <div class="article__wrapper">
            <div class="article__title">
                {{ $article->title }}
            </div>
            <div class="article__body">
                {{ $article['short_description'] }}<br><br>
                {{ $article['body'] }}
            </div>
        </div>
       <div class="article__buttons">
           <a href="/articles/{{ $article->code }}/edit">
               <button type="submit" class="article__btn _edit">
                   редактировать
               </button>
           </a>
           <form action="{{ route('articles.destroy', $article) }}" method="POST">
               @csrf
               @method('DELETE')

               <button type="submit" class="article__btn _delete">
                   удалить
               </button>
           </form>
       </div>
    </div>
@endsection
