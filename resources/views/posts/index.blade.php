@extends('layouts.app')

@section('content')

@auth
@include('layouts.pageHeader',['pageHeader' => 'ポスト一覧画面'])

<form method="GET" action="{{ route('post.index') }}">
  <input name="search" value="@if (isset($search)) {{ $search }} @endif" class="form-control" type="text" placeholder="キーワードで検索" aria-label="default input example">
  <div class="d-flex">
    <button type="submit" class="btn btn-primary">検索</button>
    <a class="btn btn-primary" href="{{ route('post.index') }}" role="button">クリア</a>
  </div>
</form>

<div class="row">
  @foreach ($posts as $post)
  <div class="col-md-4 col-12 mb-4">
    <div class="card">
      @isset ($post->image)
      <img src="{{$post->image}}" class="card-img-top cardImage" alt="...">
      @else
      <img src="{{asset('storage/images/neko.jpeg')}}" class="card-img-top cardImage" alt="...">
      @endisset
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->description}}</p>
        @include('layouts.userIcon', ['record' => $post->user])
        <a href="{{ route('post.show', ['post' => $post->id]) }}" class="btn btn-primary btn-rounded showBtn text-lowercase" role="button">詳細を見る</a>
      </div>
    </div>
  </div>
  @endforeach

  @isset($users)
  @foreach ($users as $user)
  <div class="col-md-4 col-12 mb-4">
    <div class="card">
      @isset ($user->image)
      <img src="{{$user->image}}" class="card-img-top cardImage" alt="...">
      @else
      <img src="{{asset('storage/images/neko.jpeg')}}" class="card-img-top cardImage" alt="...">
      @endisset
      <div class="card-body">
        <a href="{{ route('mypage', ['user' => $user->id]) }}" class="btn btn-primary btn-rounded showBtn text-lowercase" role="button">詳細を見る</a>
      </div>
    </div>
  </div>
  @endforeach
  @endisset

</div>
@endauth
{{ $posts->appends(request()->input())->links() }}
@endsection
