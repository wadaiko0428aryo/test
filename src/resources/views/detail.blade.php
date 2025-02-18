@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="detail-title">
        <h2>Weight Log</h2>
    </div>

    <form action="/weight_logs/{{ $weight_log->id }}/update" method="post" class="detail-form">
    @csrf
    @method('PUT')
        <div class="detail-form__group">
            <label for="date" class="detail-form__label">日付</label>
            <input class="detail-form__input" type="date" name="date" value="{{$weight_log->date}}">
            <div class="error">
                @error('date')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="detail-form__group">
            <label for="weight" class="detail-form__label">体重</label>
            <input class="detail-form__input" type="number" name="weight" value="{{$weight_log->weight}}">kg
            <div class="error">
                @error('weight')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="detail-form__group">
            <label for="calories" class="detail-form__label">摂取カロリー</label>
            <input class="detail-form__input" type="integer" name="calories" value="{{$weight_log->calories}}">cal
            <div class="error">
                @error('calories')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="detail-form__group">
            <label for="exercise_time" class="detail-form__label">運動時間</label>
            <input class="detail-form__input" type="time" name="exercise_time" value="{{$weight_log->exercise_time}}">
            <div class="error">
                @error('exercise_time')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="detail-form__group">
            <label for="exercise_content" class="detail-form__label">運動内容</label>
            <textarea name="exercise_content">{{$weight_log->exercise_content}}</textarea>
            <div class="error">
                @error('exercise_content')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="detail-form__btn">
            <a href="/weight_logs" class="back">戻る</a>
            <button class="update" type="submit">更新</button>
        </div>
    </form>
    <form action="/weight_logs/{{ $weight_log->id }}/delete" method="post">
        @csrf
        <button class="delete" type="submit">
            <img src="{{ asset('images/Group.png') }}" alt="ゴミ箱の画像">
        </button>
    </form>
@endsection