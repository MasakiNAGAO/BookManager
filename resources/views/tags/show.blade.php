@extends('layouts.app')

@section('content')
<div class="w-50">
    <h1>タグ詳細</h1>

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

    <div>
        <h2>タグ名：<b>{{$tag->name}}</b></h2>
        <h3>共有設定：<b>
            @if ($tag->share_flag === false)
            非公開(デフォルト：このタグによって作成されたリストはあなたしか閲覧できません)
            @else ($tag->share_flag === true)
            公開(このタグによって作成されたリストはURLを知っている人全員が閲覧できます)
            @endif
        </b></h3>
        <a href="/tags/{{ $tag->id }}/edit"><button type="button" class="btn btn-outline-danger">Danger</button></a>
        <a href="/tags/{{ $tag->id }}/destroy"><button type="button" class="btn btn-outline-secondary">Danger</button></a>
    </div>
</div>
@endsection