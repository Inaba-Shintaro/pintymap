<div class="input-group mb-3">
  <input name="comment" type="text" class="form-control" placeholder="コメントを記入" aria-label="Write a comment" aria-describedby="button-addon" />
  <!-- post_id hidden input -->
  <input type="hidden" name="post_id" value="{{ $post->id }}">
  <button class="commentFormButton btn btn-outline-success text-lowercase" type="submit" id="button-addon" data-mdb-ripple-color="dark">
    {{$btnTxt}}
  </button>
</div>
