@extends('layouts.app')

@section('content')
@include('layouts.pageHeader',['pageHeader' => 'ポスト編集画面'])
<div class="row">
  <div class="col-md-8 col-12">
    <div id="edit_map"></div>
  </div>
  <div class="col-md-4 col-12">
    <form action="{{ route('post.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      @include('posts.form',['post' => $post,'btnTxt' => "更新する"])
    </form>
  </div>
</div>
@endsection
