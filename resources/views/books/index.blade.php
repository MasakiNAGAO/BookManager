@extends('layouts.app')

@section('content')
<main>
    <div>
        <h1><i class="fa-solid fa-book"></i>　登録済み書籍一覧</h1>
        <div class="child">
            @if($books !== null)
            <table class="table fixed-table mt-5">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">書名</th>
                        <th scope="col">著者</th>
                        <th scope="col">出版年</th>
                        <th scope="col">出版社</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td scope="row">{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publish_date }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>
                            <a href="/books/{{ $book->id }}">詳細</a>
                        </td>
                        <td>
                            <a href="/books/{{ $book->id }}/edit">編集</a>
                        </td>
                        <td>
                            <a href="/books/{{ $book->id }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                削除
                            </a>
                            <form id="logout-form" action="/books/{{ $book->id }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        {{$books->links()}}
    </div>
</main>
@endsection