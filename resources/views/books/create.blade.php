@extends('layouts.app')

@section('content')
<div class="w-50">
    <h1>書籍登録</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    <form method="POST" action="/books" class="mb-5">
        @csrf
        <div class="form-inline mt-4 mb-4 row">
            <label for="book-name" class="col-2 d-flex justify-content-start">書名</label>
            <input type="text" name="name" id="book-name" class="form-control col-8">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="book-image" class="col-2 d-flex justify-content-start">書影(URLを入力してください)</label>
            <input type="text" name="image" id="book-image" class="form-control col-8">
        </div>
        <div class="form-inline mt-2 mb-2 row">
            <label for="book-author" class="d-flex justify-content-start">著者</label>
            <input type="text" name="author" id="book-author" class="form-control col-3">
            <label for="book-publisher" class="d-flex justify-content-start">出版社</label>
            <input type="text" name="publisher" id="book-publisher" class="form-control col-3">
        </div>
        <div class="form-inline mt-2 mb-2 row">
            <label for="book-publish_date" class="d-flex justify-content-start">出版年</label>
            <input type="number" name="publish_date" id="book-publish_date" class="form-control col-3">
            <label for="book-page_count" class="d-flex justify-content-start">ページ数</label>
            <input type="text" name="page_count" id="book-page_count" class="form-control col-3">
        </div>
        <div class="form-inline mt-2 mb-2 row">
            <label for="book-isbn" class="d-flex justify-content-start">ISBN</label>
            <input type="number" name="isbn" id="book-isbn" class="form-control col-3">
            <label for="book-issn" class="d-flex justify-content-start">ISSN</label>
            <input type="number" name="issn" id="book-issn" class="form-control col-3">
        </div>
        <div class="form-inline mt-2 mb-2 row">
            <label for="book-language" class="d-flex justify-content-start">言語</label>
            <input type="text" name="language" id="book-language" class="form-control col-3">
            <label for="book-price" class="d-flex justify-content-start">購入価格</label>
            <input type="number" name="price" id="book-price" class="form-control col-3">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="book-reading_state" class="col-2 d-flex justify-content-start">読書の状態</label>
            <div for="book-reading_state" class="form-control col-8" id="book-reading_state">
                <div class="form-check"> 
                  <input class="form-check-input" type="radio" name="reading_state" value="interesting" id="flexRadioDefault1" checked>
                  <label class="form-check-label" for="flexRadioDefault1">
                    気になる本
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="reading_state" value="bought" id="flexRadioDefault2">
                  <label class="form-check-label" for="flexRadioDefault2">
                    買った本
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="reading_state" value="reading" id="flexRadioDefault3">
                  <label class="form-check-label" for="flexRadioDefault3">
                    読んでいる本
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="reading_state" value="read" id="flexRadioDefault4">
                  <label class="form-check-label" for="flexRadioDefault4">
                    読んだ本
                  </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary">書籍を登録</button>
    </form>
</div>
@endsection