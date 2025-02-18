@extends('layouts.auth')

@section('link')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('sub-title')
ログイン
@endsection

@section('form')
<form action="/login" method="post">
@csrf
    <div class="input-group">
        <label for="email" class="label">メールアドレス</label>
        <input type="email" id="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" class="input">
    </div>
    <div class="input-group">
        <label for="password" class="label">パスワード</label>
        <input type="password" id="password" name="password" placeholder="パスワードを入力" value="{{ old('password') }}" class="input">
    </div>
    <div class="form-btn">
        <input type="submit" value="ログイン" class="submit">
    </div>
</form>

<a href="{{ route('register.step1') }}" class="link">アカウント作成はこちら</a>
@endsection