<!-- name input -->
<div class="mb-4">
  <label for="inputPassword5" class="form-label">アカウント名</label>
  <input  name="name" class="form-control" type="text" placeholder="タイトル" value="{{$user->name ?? ''}}">
</div>

<!-- Submit button -->
<button type="submit" class="btn btn-success btn-rounded text-lowercase descriptionSm text-white mt-3" data-mdb-ripple-color="dark">
  {{$btnTxt}}
</button>
