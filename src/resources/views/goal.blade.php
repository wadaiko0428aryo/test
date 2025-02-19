@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal.css') }}">
@endsection

@section('content')
<div class="goal">
    <div class="goal-title">
        <h2>目標体重設定</h2>
    </div>

<form action="/weight_logs/goal_setting/update" method="post" class="goal-form">
    @csrf
    @method('PUT')

    <input type="hidden" name="weight_target_id" value="{{ $weight_target->id ?? '' }}">

    <div class="goal-form__group">
        <input class="goal-form__input" type="number" name="target_weight" id="target_weight" value="{{ old('target_weight', $weight_target->target_weight ?? '') }}">kg
        <div class="error">
            @error('target_weight')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="detail-form__btn">
        <a href="/weight_logs" class="back">戻る</a>
        <button class="update" type="submit">更新</button>
    </div>
</form>
</div>
@endsection