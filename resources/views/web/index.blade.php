@extends('layouts.app')

@section('content')
<main>
    <div>
        <p><i class="fa-solid fa-magnifying-glass"></i>　本の検索</p>
        <div class="child input-group mb-3">
            <input type="text" class="form-control" placeholder="フリーワード">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">検索</button>
        </div>
        <div class="child accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    詳細検索
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <p><i class="fa-solid fa-list"></i>　リスト一覧</p>
        <div class="child">
            <a href="{{ route('book.interesting') }}">気になる本</a>
            <a href="{{ route('book.bought') }}">買った本</a>
            <a href="{{ route('book.reading') }}">読んでいる本</a>
            <a href="{{ route('book.read') }}">読んだ本</a>
            @if($tags !== null)
            @foreach($tags as $tag)
            <a href="{{ route('tags.index', ['tag' => $tag->id]) }}">{{$tag->name}}</a>    
            @endforeach
            @endif
        </div>
    </div>
    <div>
        <p><i class="fa-solid fa-square-plus"></i>　最近登録した本</p>
    </div>
    <div>
        <p><i class="fa-solid fa-book"></i>　<a href="{{ route('books.index') }}">登録済み書籍一覧</a></p>
    </div>
</main>
@endsection