<!-- name input -->
<div class="mb-4">
  <label for="inputPassword5" class="form-label">アカウント名</label>
  <input  name="name" class="form-control" type="text" placeholder="タイトル" value="{{$user->name ?? ''}}">
</div>

<!-- introduction input -->
<div class="mb-4">
  <label for="postintroductionTextarea" class="form-label">自己紹介</label>
  <textarea name="introduction" class="form-control" id="postintroductionTextarea" rows="4">{{$user->introduction ?? ''}}</textarea>
</div>

<!-- image input -->
<label class="form-label" for="customFile">アイコン画像</label>
<input name="image" type="file" class="form-control" id="customFile" />

<!-- Submit button -->
<button type="submit" class="btn btn-success btn-rounded text-lowercase descriptionSm text-white mt-3" data-mdb-ripple-color="dark">
  {{$btnTxt}}
</button>
