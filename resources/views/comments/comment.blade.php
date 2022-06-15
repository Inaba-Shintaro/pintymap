<div class="d-flex align-items-center mb-2">
  @include('layouts.userIcon', ['record' => $comment->user])
  <p class="mb-0 ms-4 me-auto commentFz">{{$comment->comment}}</p>
  @auth
  @if ($comment->user_id === Auth::id())
  <form class="commentDeleteForm" action="{{ route('comment.destroy', ['comment' => $comment->id])}}" method="post">
    @method('DELETE')
    @csrf
    <button class="btn btn-outline-danger btn-rounded text-lowercase descriptionSm" href="#!" type="submit">
      <i class="fas fa-trash me-2"></i>削除
    </button>
  </form>
  @endif
  @endauth
</div>
