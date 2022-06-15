<p>{{$post->user->name}}</p>
<a href="{{ route('mypage', ['user' => $post->user->id]) }}">
  @isset ($user->image)
  <img src="{{$user->image}}" class="card-img-top cardImage" alt="...">
  @else
  <img src="{{asset('storage/images/neko.jpeg')}}" class="card-img-top cardImage" alt="...">
  @endisset
</a>
