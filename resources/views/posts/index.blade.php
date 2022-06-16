@extends('layouts.app')

@section('content')

@auth
@include('layouts.pageHeader',['pageHeader' => '投稿一覧画面'])

<form method="GET" action="{{ route('post.index') }}">
  <input name="search" value="@if (isset($search)) {{ $search }} @endif" class="form-control mb-3" type="text" placeholder="キーワードで検索" aria-label="default input example">
  <div class="d-flex">
    <button type="submit" class="btn btn-primary me-3">検索</button>
    <a class="btn btn-primary" href="{{ route('post.index') }}" role="button">クリア</a>
  </div>
</form>

<hr>

<div class="row">
  @foreach ($posts as $post)
  @include('posts.loopItem',['post' => $post])
  @endforeach

  @isset($users)
  @foreach ($users as $user)
  <div class="col-md-4 col-12 mb-4">
    <div class="card">
      @isset ($user->image)
      <img src="{{$user->image}}" class="card-img-top cardImage" alt="...">
      @else
      <img src="{{asset('images/default.png')}}" class="card-img-top cardImage" alt="...">
      @endisset
      <div class="card-body">
        <a href="{{ route('mypage', ['user' => $user->id]) }}" class="btn btn-primary btn-rounded showBtn text-lowercase" role="button">{{$user->name}}さんのマイページへ</a>
      </div>
    </div>
  </div>
  @endforeach
  @endisset

</div>
@endauth
{{ $posts->appends(request()->input())->links() }}
@endsection
