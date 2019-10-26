@extends('layout.app')

@section('content')
    <div class="form-wrapper">
        <form class="form" action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form__info">
                <div class="form__title">
                    Add new article
                </div>
                <div class="form__description">

                </div>
            </div>

            <div class="form__row">
                <div class="form__cell">
                    @include('form.input', [
                        'title' => 'title',
                        'label' => 'Article title',
                        'value' => $article->title
                    ])
                </div>
                <div class="form__cell">
                    @include('form.input', [
                       'title' => 'code',
                       'label' => 'Article code',
                       'value' => $article->code
                    ])
                </div>
            </div>

            <div class="form__row">
                @include('form.input', [
                    'title' => 'short_description',
                    'label' => 'Short description',
                    'value' => $article['short_description']
                ])
            </div>

            <div class="form__row">
                @include('form.textarea', [
                    'title' => 'body',
                    'label' => 'Article content',
                    'value' => $article->body
                ])
            </div>

            <div class="form__row _center">
                <button type="submit" class="btn">Отредактировать</button>
            </div>
        </form>
    </div>
@endsection
