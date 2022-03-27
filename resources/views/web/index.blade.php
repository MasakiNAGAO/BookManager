@extends('layouts.app')

@section('content')
<div>
    <div>
        検索窓
    </div>
    <div>
        <p>リスト一覧</p>
        <div>
            <a href="{{ route('books.interesting') }}">気になる本</a>
            <a href="{{ route('books.bought') }}">買った本</a>
            <a href="{{ route('books.reading') }}">読んでいる本</a>
            <a href="{{ route('books.read') }}">読んだ本</a>
            @if($tags !== null)
            @foreach($tags as $tag)
            <a href="{{ route('tags.index', ['tag' => $tag->id]) }}">{{$tag->name}}</a>    
            @endforeach
            @endif
        </div>
    </div>
    <br>
    <div>
        <a href="{{ route('books.index') }}">登録済み書籍一覧</a>
    </div>
</div>
@endsection