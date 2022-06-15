@extends('layouts.app')
@section('content')

@include('layouts.pageHeader',['pageHeader' => 'ポスト詳細画面'])

<div class="row mb-3">
  <div class="col-md-8 col-12 mb-md-0 mb-4">
    <div id="show_map"></div>
  </div>
  <div class="col-md-4 d-none d-md-block">
    @include('layouts.pageHeader',['pageHeader' => 'タイトル'])
    <p>{{$post->title}}</p>
    <hr>
    @include('layouts.pageHeader',['pageHeader' => '説明文'])
    @isset($post->description)
    <p>{{$post->description}}</p>
    @else
    <p>説明文はありません</p>
    @endisset
  </div>
</div>

<div class="row">
  <div class="col-md-8 d-md-flex align-items-center col-12">
    <p class="fs-3 fw-bold me-auto mb-md-0 mb-2">{{$post->title}}</p>
    @include('layouts.userIcon', ['record' => $post->user])
    <div class="mb-2 mb-md-0"></div>
    @auth
    @if(Auth::id() == $post->user_id)
    @include('posts.edit_delete_button')
    @endif
    @endauth
  </div>
</div>

<hr>

@include('layouts.pageHeader',['pageHeader' => 'コメント'])

@auth
<form action="{{ route('comment.store', ['post_id' => $post->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @include('comments.form',['post' => $post, 'btnTxt' => "コメント"])
</form>
@endauth

@if($post->comments != null)
@foreach ($post->comments as $comment)
@include('comments.comment',['comment' => $comment])
<hr>
@endforeach
@endif

@endsection
