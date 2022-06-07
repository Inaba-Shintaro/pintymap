@extends('layouts.app')

@section('content')
@include('layouts.pageHeader',['pageHeader' => 'ポスト編集画面'])

<form action="{{ route('post.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  @include('posts.form',['post' => $post,'btnTxt' => "更新する"])
</form>
@endsection
