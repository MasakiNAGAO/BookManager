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
      
        <div class="child accordion">
            <div data-toggle="collapse" data-target="#target1" aria-expand="false" aria-controls="#target1">&nbsp;&nbsp;<i class="fa-solid fa-plus"></i> 詳細検索</div>
            <div class="collapse" id="target1">
                <div id="detail_search">
                    <form method="POST" action="/result" class="mb-2">
                        @csrf
                        <div class="form-inline mt-2 mb-2 row">
                            <label for="book-name" class="d-flex justify-content-start">書名</label>
                            <input type="text" name="name" id="book-name" class="form-control col-7">
                        </div>
                        <div class="form-inline mt-2 mb-2 row">
                            <label for="book-author" class="d-flex justify-content-start">著者</label>
                            <input type="text" name="author" id="book-author" class="form-control col-3">
                            <label for="book-publisher" class="d-flex justify-content-start">出版社</label>
                            <input type="text" name="publisher" id="book-publisher" class="form-control col-3">
                        </div>
                        <div class="form-inline mt-2 mb-2 row">
                            <label for="book-publish_date" class="d-flex justify-content-start">出版年</label>
                            <input type="number" name="publish_date_from" id="book-publish_date_from" class="form-control col-2">
                            <span class="from_to">～</span>
                            <input type="number" name="publish_date_top" id="book-publish_date_top" class="form-control col-2">
                        </div>
                        <div class="form-inline mt-2 mb-2 row">
                            <label for="book-isbn" class="d-flex justify-content-start">ISBN</label>
                            <input type="number" name="isbn" id="book-isbn" class="form-control col-3">
                            <label for="book-issn" class="d-flex justify-content-start">ISSN</label>
                            <input type="number" name="issn" id="book-issn" class="form-control col-3">
                        </div>
                        <div id="detail_search_button" class="mt-3 mb-2">
                            <button type="submit" class="btn btn-primary">詳細検索</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div>
        <h1><i class="fa-solid fa-list"></i>　リスト一覧</h1>
        <div class="child">
            <a class="list_content" href="{{ route('book.interesting') }}">気になる本 <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <a class="list_content" href="{{ route('book.bought') }}">買った本 <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <a class="list_content" href="{{ route('book.reading') }}">読んでいる本 <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <a class="list_content" href="{{ route('book.read') }}">読んだ本 <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            @if($tags !== null)
            @foreach($tags as $tag)
            <a class="list_content" href="{{ route('tags.index', ['tag' => $tag->id]) }}">{{$tag->name}}</a>    
            @endforeach
            @endif
        </div>
    </div>
    <br>
    <div>
        <h1><i class="fa-solid fa-square-plus"></i>　最近登録した本</h1>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="..." class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </div>
    <br>
    <div>
        <h1><i class="fa-solid fa-book"></i><a href="{{ route('books.index') }}">　登録済み書籍一覧 <i class="fa-solid fa-arrow-up-right-from-square"></i></a></h1>
    </div>
</main>
@endsection