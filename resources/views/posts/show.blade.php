@extends('layouts.app')
@section('content')

@include('layouts.pageHeader',['pageHeader' => 'ポスト詳細画面'])

<div id="show_map"></div>

<p>{{$post->title}}</p>
<p>{{$post->description}}</p>
@include('layouts.userIcon')

@auth
@if(Auth::id() == $post->user_id)
@include('posts.edit_delete_button')
@endif
@endauth

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
@endforeach
@endif


@endsection
