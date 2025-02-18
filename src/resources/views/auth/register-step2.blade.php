@extends('layouts.auth')

@section('link')
<link rel="stylesheet" href="{{ asset('css/register2.css') }}">
@endsection

@section('sub-title')
新規会員登録
@endsection

@section('step-label')
STEP2 体重データの入力
@endsection

@section('form')
<form method="post" action="{{ route('register.step2') }}">
@csrf
    <div class="input-group">
        <label for="current_weight" class="label">現在の体重</label>
        <input type="number" id="current_weight" name="current_weight" placeholder="現在の体重を入力" value="{{ old('current_weight') }}" class="input">
    </div>
    <div class="input-group">
        <label for="target_weight" class="label">目標の体重</label>
        <input type="number" id="target_weight" name="target_weight"  placeholder="目標の体重を入力" value="{{ old('target_weight') }}" class="input">
    </div>
    <div class="form-btn">
        <input type="submit" value="アカウント作成" class="submit">
    </div>
</form>
@endsection