@extends('layouts.app')

@section('content')

@auth
@include('layouts.pageHeader',['pageHeader' => 'ポスト一覧画面'])

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
        @include('layouts.userIcon')
        <a href="{{ route('post.show', ['post' => $post->id]) }}" class="btn btn-primary btn-rounded showBtn text-lowercase" role="button">詳細を見る</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endauth
{{ $posts->links() }}
@endsection
