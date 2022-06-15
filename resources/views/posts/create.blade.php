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

<div class="row">
  <div class="col-md-8 col-12">
    <div id="map" class="mb-3 mb-md-0"></div>
  </div>
  <div class="col-md-4 col-12">
    <form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @include('posts.form',['btnTxt' => "投稿する"])
    </form>
  </div>
</div>

@endsection
