@extends('layout.app')

@section('content')
    <div class="form-wrapper">
        <form class="form" action="/articles" method="post">
            @csrf
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
                        'label' => 'Article title'
                    ])
                </div>
                <div class="form__cell">
                    @include('form.input', [
                       'title' => 'code',
                       'label' => 'Article code'
                    ])
                </div>
            </div>

            <div class="form__row">
                @include('form.input', [
                    'title' => 'short_description',
                    'label' => 'Short description'
                ])
            </div>

            <div class="form__row">
                @include('form.textarea', [
                    'title' => 'body',
                    'label' => 'Article content'
                ])
            </div>

            <div class="form__row _center">
                <button type="submit" class="btn">Опубликовать</button>
            </div>
        </form>
    </div>
@endsection
