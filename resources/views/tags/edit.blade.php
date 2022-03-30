@extends('layouts.app')

@section('content')
<div class="w-50">
    <h1>タグ編集</h1>

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

    <form method="POST" action="/tags/{{$tag->id}}" class="mb-5">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-inline mt-4 mb-4 row">
            <label for="tag-name" class="col-2 d-flex justify-content-start">タグ名</label>
            <input type="text" name="name" id="tag-name" class="form-control col-8" value="{{ $tag->name }}">
        </div>
        
        @if($tag->share_flag === false)
        <p>現在このタグによって生成されたリストは非公開設定となっています。<br>
        公開設定に変更されるさいは以下の項目にチェックを入れてください。</p>
        
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="share_flag" value="yes" id="flexCheckChecked">
          <label class="form-check-label" for="flexCheckChecked">
            リストを公開する
          </label>
        </div>
        
        @else($tag->share_flag === true)
        <p>現在このタグによって生成されたリストは公開設定となっています。<br>
        非公開設定に変更されるさいは以下の項目にチェックを入れてください。</p>
        
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="share_flag" value="no" id="flexCheckChecked">
          <label class="form-check-label" for="flexCheckChecked">
            リストを非公開にする
          </label>
        </div>
        @endif
        
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn">更新</button>
        </div>
    </form>
    
</div>
@endsection