@extends('layouts.app')
@section('content')

@include('layouts.pageHeader',['pageHeader' => 'マイページ'])

<p>{{$user->name}}</p>
<p>{{$user->introduction}}</p>

@isset ($user->image)
<img src="{{$user->image}}" class="card-img-top cardImage" alt="...">
@else
<img src="{{asset('storage/images/neko.jpeg')}}" class="card-img-top cardImage" alt="...">
@endisset

@auth
@if(Auth::id() === $user->id && Auth::id() !== 1)
@include('users.edit_button')
@endif
@endauth

@include('layouts.pageHeader',['pageHeader' => '投稿一覧'])

<div class="row">
  @foreach ($user->posts as $post)
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
</div>


@endsection
