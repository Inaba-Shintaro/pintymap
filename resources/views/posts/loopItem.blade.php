<div class="col-md-4 col-12 mb-4">
  <div class="card">
    @isset ($post->image)
    <img src="{{$post->image}}" class="card-img-top cardImage" alt="...">
    @else
    <img src="{{asset('images/map.png')}}" class="card-img-top cardImage" alt="...">
    @endisset
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{\Illuminate\Support\Str::limit($post->description, 60, '...')}}</p>
      <div class="d-flex justify-content-between">
        <a href="{{ route('post.show', ['post' => $post->id]) }}" class="btn btn-primary btn-rounded showBtn text-lowercase" role="button">詳細を見る</a>
        @include('layouts.userIcon', ['record' => $post->user])
      </div>
    </div>
  </div>
</div>
