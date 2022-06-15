<div class="d-flex align-items-center mb-2">
  <a href="{{ route('mypage', ['user' => $record->id]) }}">
    @isset ($record->image)
    <img src="{{$record->image}}" class="userIconImage" alt="...">
    @else
    <img src="{{asset('storage/images/neko.jpeg')}}" class="userIconImage" alt="...">
    @endisset
  </a>
  <p class="mb-0">{{$record->name}}</p>
</div>
