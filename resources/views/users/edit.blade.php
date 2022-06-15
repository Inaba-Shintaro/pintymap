@extends('layouts.app')

@section('content')

@include('layouts.pageHeader',['pageHeader' => 'アカウント情報編集画面'])

<form action="{{ route('user.update', ['user' => $user->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  @include('users.form',['user' => $user,'btnTxt' => "更新する"])
</form>

@auth
@if (Auth::id() === $user->id && Auth::id() !== 1)
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger btn-rounded text-lowercase mt-4 descriptionSm" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
  <i class="fas fa-trash"></i>アカウントを削除する
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-exclamation-triangle descriptionXl delete_confirm_icon me-4"></i>
        <h5 class="modal-title" id="exampleModalLabel">アカウント削除</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-2">削除すると以下の情報が全て失われます。</p>
        <div>
          <ul>
            <li>プロフィール情報</li>
            <li>アップロードした投稿</li>
            <li>コメント</li>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-mdb-dismiss="modal">閉じる</button>
        <form action="{{ route('user.destroy', ['user' => Auth::id()]) }}" method="post">
          @method('DELETE')
          @csrf
          <!-- Submit button -->
          <button type="submit" class="btn btn-danger btn-block">このアカウントを削除する</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
@endauth

@endsection
