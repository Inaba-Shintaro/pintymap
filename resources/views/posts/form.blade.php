<!-- title input -->
<div class="mb-4">
  <label for="inputPassword5" class="form-label">タイトル</label>
  <input  name="title" class="form-control" type="text" placeholder="タイトル" value="{{$post->title ?? ''}}">
</div>

<!-- description input -->
<div class="mb-4">
  <label for="postDescriptionTextarea" class="form-label">説明文</label>
  <textarea name="description" class="form-control" id="postDescriptionTextarea" rows="4">{{$post->description ?? ''}}</textarea>
</div>

<!-- Submit button -->
<button type="submit" class="btn btn-success btn-rounded text-lowercase descriptionSm text-white mt-3" data-mdb-ripple-color="dark">
  {{$btnTxt}}
</button>
