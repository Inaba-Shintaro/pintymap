<p>{{$record->name}}</p>
<a href="{{ route('mypage', ['user' => $record->id]) }}">
  @isset ($record->image)
  <img src="{{$record->image}}" class="card-img-top cardImage" alt="...">
  @else
  <img src="{{asset('storage/images/neko.jpeg')}}" class="card-img-top cardImage" alt="...">
  @endisset
</a>
