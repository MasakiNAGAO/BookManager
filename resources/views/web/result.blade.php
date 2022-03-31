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
            <h2>{{ $item['volumeInfo']['title']}}　@if (array_key_exists('previewLink', $item['volumeInfo']))[<a href="{{$item['volumeInfo']['previewLink']}}" target="_blank" rel="noopener noreferrer">試し読み</a>]@endif</h2>
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
            
            <form method="POST" action="/books" class="mb-5">
                @csrf
                <input type="hidden" name="title" value="{{$item['volumeInfo']['title']}}
                @if (array_key_exists('subtitle', $item['volumeInfo']))
                    ：{{ $item['volumeInfo']['subtitle']}}
                @endif">
                @if (array_key_exists('imageLinks', $item['volumeInfo']))
                    <input type="hidden" name="image" value="{{$item['volumeInfo']['imageLinks']['thumbnail']}}">
                @endif
                @if (array_key_exists('publishedDate', $item['volumeInfo']))
                    <input type="hidden" name="publish_date" value="{{$item['volumeInfo']['publishedDate']}}">
                @endif
                @if (array_key_exists('industryIdentifiers', $item['volumeInfo']))
                    @foreach ($item['volumeInfo']['industryIdentifiers'] as $industryIdentifier)
                        @if ($industryIdentifier['type']==='ISBN_13')
                        <input type="hidden" name="isbn" value="{{$industryIdentifier['identifier']}}">
                        @break
                        @endif
                        @if ($industryIdentifier['type']==='ISBN_10')
                        <input type="hidden" name="isbn" value="{{$industryIdentifier['identifier']}}">
                        @break
                        @endif
                        @if ($industryIdentifier['type']==='ISSN')
                        <input type="hidden" name="issn" value="{{$industryIdentifier['identifier']}}">
                        @break
                        @endif
                    @endforeach
                @endif
                @if (array_key_exists('pageCount', $item['volumeInfo']))
                    <input type="hidden" name="page_count" value="{{$item['volumeInfo']['pageCount']}}">
                @endif
                @if (array_key_exists('language', $item['volumeInfo']))
                    <input type="hidden" name="language" value="{{$item['volumeInfo']['language']}}">
                @endif
                @if (array_key_exists('description', $item['volumeInfo']))
                    <input type="hidden" name="blurb" value="{{$item['volumeInfo']['description']}}">
                @endif
                <input type="hidden" name="reading_state" value="interesting">
                
                <button type="submit" class="btn btn-outline-primary">この本を登録する</button>
            </form>

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