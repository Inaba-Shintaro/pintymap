@extends('layouts.app')
@section('content')

@include('layouts.pageHeader',['pageHeader' => 'マイページ'])

<p>{{$user->name}}</p>

@auth
@if(Auth::id() === $user->id && Auth::id() !== 1)
@include('users.edit_button')
@endif
@endauth

@endsection
