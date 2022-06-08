@extends('layouts.app')
@section('content')

@include('layouts.pageHeader',['pageHeader' => 'ポスト作成画面'])

@if ($errors->any())
<div class="card-text text-left alert alert-danger">
  <ul class="mb-0">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div id="map"></div>

<form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  経度<input name="lat" id="sample_lat" type="text" value="" readonly>
  緯度<input name="lng" id="sample_lng" type="text" value="" readonly>
  @include('posts.form',['btnTxt' => "投稿する"])
</form>

@endsection
