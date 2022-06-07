<p>{{$comment->user->name}}のコメント</p>
<p>{{$comment->comment}}</p>

@auth
@if ($comment->user_id === Auth::id())
<form class="commentDeleteForm" action="{{ route('comment.destroy', ['comment' => $comment->id])}}" method="post">
  @method('DELETE')
  @csrf
  <button class="btn btn-outline-danger btn-rounded text-lowercase mb-3 descriptionSm" href="#!" type="submit">
    <i class="fas fa-trash me-2"></i>削除
  </button>
</form>
@endif
@endauth
