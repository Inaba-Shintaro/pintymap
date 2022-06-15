@extends('layouts.auth_app')

@section('content')
<div class="card shadow-2-strong loginFormWrapper" style="border-radius: 1rem;">
    <div class="card-body p-5 text-center">

        <h3 class="mb-5">新規登録</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- name input -->
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-outline mb-4">
                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label class="form-label" for="name">アカウント名</label>
            </div>

            <!-- email input -->
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-outline mb-4">
                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label class="form-label" for="email">メールアドレス</label>
            </div>

            <!-- password input -->
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-outline mb-4">
                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <label class="form-label" for="password">パスワード</label>
            </div>

            <!-- confirm_password input -->
            <div class="form-outline mb-4">
                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                <label class="form-label" for="password-confirm">パスワード（確認）</label>
            </div>

            <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">新規登録</button>

            <hr class="mb-4" />

            <!-- Register buttons -->
            @if (Route::has('login'))
            <div class="text-center">
                <p>登録済みの方は<a href="{{ route('login') }}">ログイン</a></p>
            </div>
            @endif
        </form>
    </div>
</div>

@endsection
