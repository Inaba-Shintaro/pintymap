@extends('layouts.app')
@section('content')

@include('layouts.pageHeader',['pageHeader' => 'マイページ'])

<p>{{$user->name}}</p>
<p>{{$user->introduction}}</p>
@isset ($user->image)
<img src="{{$user->image}}" class="card-img-top cardImage" alt="...">
@else
<img src="{{asset('storage/images/neko.jpeg')}}" class="card-img-top cardImage" alt="...">
@endisset

@auth
@if(Auth::id() === $user->id && Auth::id() !== 1)
@include('users.edit_button')
@endif
@endauth

@endsection
