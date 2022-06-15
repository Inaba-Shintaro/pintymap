@extends('layouts.auth_app')

@section('content')
<div class="card shadow-2-strong loginFormWrapper" style="border-radius: 1rem;">
    <div class="card-body p-5 text-center">

        <h3 class="mb-5">ログイン</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email input -->
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-outline mb-4">
                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label class="form-label" for="email">メールアドレス</label>
            </div>

            <!-- Password input -->
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-outline mb-4">
                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label class="form-label" for="password">パスワード</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">ログイン状態を保存する</label>
            </div>

            <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">ログイン</button>

            <hr class="mb-4" />

            <!-- Simple link -->
            @if (Route::has('password.request'))
            <a class="btn btn-link mb-4" href="{{ route('password.request') }}">
                {{ __('パスワードを忘れてしまった') }}
            </a>
            @endif

            <!-- Register buttons -->
            @if (Route::has('register'))
            <div class="text-center">
                <p>登録をしていない方は<a href="{{ route('register') }}">新規登録</a></p>
            </div>
            @endif
        </form>
    </div>
</div>
@endsection
