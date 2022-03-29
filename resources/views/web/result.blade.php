@extends('layouts.app')

@section('content')
<main>
    <div>
        <h1><i class="fa-solid fa-magnifying-glass"></i>　新しい本を探す</h1>

        <form method="POST" action="/result">
            @csrf
            <div id="free_search" class="child input-group mb-3">
                <input type="text" name="keyword" class="form-control" placeholder="フリーワード">
                <button class="btn btn-primary" type="submit" id="button-addon2">検索</button>
            </div>
        </form>
    </div>
    <div>
    @if ($items == null)
        <p>キーワードが入力されていません</p>
    @else (count($items) > 0)
        <p>「{{ $keyword }}」の検索結果</p>
        <hr>
        @foreach ($items as $item)
            <h2>{{ $item['volumeInfo']['title']}}</h2>
            @if (array_key_exists('subtitle', $item['volumeInfo']))
            <h3>{{ $item['volumeInfo']['subtitle']}}</h3>
            @endif
            
            <div class="row">
                <div class="col-2">
                    @if (array_key_exists('imageLinks', $item['volumeInfo']))
                        <img src="{{ $item['volumeInfo']['imageLinks']['thumbnail']}}"><br>
                    @endif
                </div>
                <div class="col-6">
                    <b>著者：</b>
                    @if (array_key_exists('authors', $item['volumeInfo']))
                        {{ $item['volumeInfo']['authors'][0]}}<br>
                    @endif
                    <br>
                    <b>発行年：</b>
                    @if (array_key_exists('publishedDate', $item['volumeInfo']))
                        {{ $item['volumeInfo']['publishedDate']}}<br>
                    @endif
                    <b>ページ数：</b>
                    @if (array_key_exists('pageCount', $item['volumeInfo']))
                        {{ $item['volumeInfo']['pageCount']}}<br>
                    @endif
                    <b>言語：</b>
                    @if (array_key_exists('language', $item['volumeInfo']))
                        {{ $item['volumeInfo']['language']}}<br>
                    @endif
                    <br>
                    @if (array_key_exists('industryIdentifiers', $item['volumeInfo']))
                    @foreach ($item['volumeInfo']['industryIdentifiers'] as $industryIdentifier)
                        <b>{{ $industryIdentifier['type'] }}：</b>{{ $industryIdentifier['identifier'] }} <br>
                    @endforeach
                    @endif
                </div>
            </div>
            <br>
            @if (array_key_exists('description', $item['volumeInfo']))
                <b>概要：</b>{{ $item['volumeInfo']['description']}}<br>
            @endif
            <br>
            <hr>
        @endforeach
    @endif
    </div>
    <br>
    <div>
        <h1><i class="fa-solid fa-book"></i><a href="{{ route('books.index') }}">　登録済み書籍一覧 <i class="fa-solid fa-arrow-up-right-from-square"></i></a></h1>
    </div>
</main>
@endsection