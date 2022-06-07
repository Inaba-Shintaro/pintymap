<a class="btn btn-outline-success btn-rounded text-lowercase mb-3 descriptionSm text-end editBtn" href="{{ route('post.edit', ['post' => $post->id] )}}" role="button">
  <i class="far fa-edit me-2"></i>編集
</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger btn-rounded text-lowercase mb-3 descriptionSm" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
  <i class="fas fa-trash me-2"></i>削除
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-exclamation-triangle descriptionXl delete_confirm_icon me-4"></i>
        <h5 class="modal-title" id="exampleModalLabel">投稿削除</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-2">削除すると以下の情報が全て失われます。</p>
        <div>
          <ul>
            <li>この投稿</li>
            <li>この投稿へのコメント</li>
            <li>この投稿へのいいね</li>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">閉じる</button>
        <form action="{{ route('post.destroy', ['post' => $post->id])}}" method="post">
          @method('DELETE')
          @csrf
          <!-- Submit button -->
          <button type="submit" class="btn btn-danger btn-block">この投稿を削除する</button>
        </form>
      </div>
    </div>
  </div>
</div>
