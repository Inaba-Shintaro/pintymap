<!-- position input -->
<input name="lat" id="sample_lat" type="text" value="" readonly hidden>
<input name="lng" id="sample_lng" type="text" value="" readonly hidden>

<!-- title input -->
<div class="mb-4">
  <label for="inputPassword5" class="form-label">タイトル</label>
  <small>(255文字以内)</small>
  <input name="title" class="form-control" type="text" placeholder="タイトル" value="{{$post->title ?? ''}}">
</div>

<!-- description input -->
<div class="mb-4">
  <label for="postDescriptionTextarea" class="form-label">説明文</label>
  <small>(255文字以内)</small>
  <textarea name="description" class="form-control" id="postDescriptionTextarea" rows="10">{{$post->description ?? ''}}</textarea>
</div>

<!-- image input -->
<label class="form-label" for="customFile">サムネイル画像</label>
<input name="image" type="file" class="form-control" id="customFile" />

<!-- Submit button -->
<button type="submit" class="btn btn-success btn-rounded text-lowercase descriptionSm text-white mt-3" data-mdb-ripple-color="dark">
  {{$btnTxt}}
</button>
