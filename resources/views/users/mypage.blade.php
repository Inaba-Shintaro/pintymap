@extends('layouts.app')
@section('content')

<div class="d-md-flex mb-3 text-center text-md-start">
  @isset ($user->image)
  <img src="{{$user->image}}" class="cardImage mb-2 mb-md-0" alt="...">
  @else
  <img src="{{asset('storage/images/neko.jpeg')}}" class="cardImage mb-2 mb-md-0" alt="...">
  @endisset
  <p class="ms-md-3 fs-1">{{$user->name}}</p>
</div>
@auth
@if (Auth::id() === $user->id && Auth::id() !== 1)
  @include('layouts.pageHeader',['pageHeader' => '自己紹介'])
  <hr>
  <p>{{$user->introduction}}</p>
@endif
@endauth

@auth
@if(Auth::id() === $user->id && Auth::id() !== 1)
@include('users.edit_button')
@endif
@endauth

@include('layouts.pageHeader',['pageHeader' => '投稿一覧'])

<div class="row">
  @foreach ($user->posts as $post)
  @include('posts.loopItem',['post' => $post])
  @endforeach
</div>

@endsection
