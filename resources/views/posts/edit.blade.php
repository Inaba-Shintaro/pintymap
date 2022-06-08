@extends('layouts.app')

@section('content')
@include('layouts.pageHeader',['pageHeader' => 'ポスト編集画面'])

<div id="edit_map"></div>

<form action="{{ route('post.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  経度<input name="lat" id="sample_lat" type="text" value="" readonly>
  緯度<input name="lng" id="sample_lng" type="text" value="" readonly>
  @include('posts.form',['post' => $post,'btnTxt' => "更新する"])
</form>
@endsection
