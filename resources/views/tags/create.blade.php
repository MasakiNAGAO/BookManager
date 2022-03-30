@extends('layouts.app')

@section('content')
<div class="w-50">
    <h1>タグ登録</h1>

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

    <form method="POST" action="/tags/create" class="mb-5">
        @csrf
        <div class="form-inline mt-4 mb-4 row">
            <label for="tag-name" class="col-2 d-flex justify-content-start">タグ名</label>
            <input type="text" name="name" id="tag-name" class="form-control col-8">
        </div>
    </form>
</div>
@endsection