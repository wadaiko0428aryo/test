@extends('layouts.auth')

@section('link')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('sub-title')
新規会員登録
@endsection

@section('step-label')
STEP1 アカウント情報の登録
@endsection

@section('form')
<form method="post" action="{{ route('register.step1') }}">
@csrf
    <div class="input-group">
        <label for="name" class="label">お名前</label>
        <input type="name" id="name" name="name" placeholder="名前を入力" value="{{ old('name') }}" class="input">
    </div>
    <div class="input-group">
        <label for="email" class="label">メールアドレス</label>
        <input type="email" id="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" class="input">
    </div>
    <div class="input-group">
        <label for="password" class="label">パスワード</label>
        <input type="password" id="password" name="password" placeholder="パスワードを入力" value="{{ old('password') }}" class="input">
    </div>
    <div class="form-btn">
        <input type="submit" value="次に進む" class="submit">
    </div>
</form>

<a href="/login" class="login-link">ログインはこちら</a>
@endsection