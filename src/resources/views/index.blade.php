@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="content-hight">
        <div class="hight-meter">
            <span class="weight-title">目標体重</span>
            @if(isset($weight_targets) && $weight_targets)
                <span class="weight-numeric">{{ $weight_targets->target_weight }}</span>kg
            @else
                <p>目標体重のデータが登録されていません</p>
            @endif
        </div>
        <div class="hight-meter">
            <span class="weight-title">目標まで</span>
            <span class="weight-numeric">-1.5</span>kg
        </div>
        <div class="hight-meter">
            <span class="weight-title">最新体重</span>
            @if($weight_targets)
                <span class="weight-numeric"> {{ Auth::user()->weightTarget->target_weight ?? '未設定' }} </span>kg
            @else
                <p>最新体重のデータが登録されていません</p>
            @endif
        </div>
    </div>

    <div class="content-row">
        <div class="content-inner">

            <div class="content-search">
                <form action="/weight_logs/search" method="get">
                @csrf
                    <div class="search-form">
                        <div class="search-input">
                            <input class="search-form__date" type="date" name="start_date" value="{{request('start_date')}}">
                            <span>〜</span>
                            <input class="search-form__date" type="date" name="end_date" value="{{request('end_date')}}">
                            <input type="submit" value="検索" class="search-form__button">
                        </div>

                        <a href="#modal-add" class="modal-add__button">データ追加</a>
                    </div>
                </form>



                <div class="modal" id="modal-add">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal__inner">
                        <div class="modal__content">
                            <h2>Weight Logを追加</h2>
                                <form class="modal__detail-form" action="/weight_logs/create" method="POST">
                                    @csrf
                                    <div class="modal-form__group">
                                        <label class="modal-form__label">日付</label>
                                        <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
                                        <div class="error">
                                            @error('date')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-form__group">
                                        <label class="modal-form__label">体重</label>
                                        <input type="number" name="weight" placeholder="50.0" value="{{ old('weight') }}"> kg
                                        <div class="error">
                                            @error('weight')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-form__group">
                                        <label class="modal-form__label">摂取カロリー</label>
                                        <input type="number" name="calories" placeholder="1200" value="{{ old('calories') }}"> cal
                                        <div class="error">
                                            @error('calories')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-form__group">
                                        <label class="modal-form__label">運動時間</label>
                                        <input type="time" name="exercise_time" value="{{ old('exercise_time', '00:00') }}">
                                        <div class="error">
                                            @error('exercise_time')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-form__group">
                                        <label class="modal-form__label">運動内容</label>
                                        <textarea name="exercise_content" placeholder="運動内容を追加">{{ old('exercise_content') }}</textarea>
                                        <div class="error">
                                            @error('exercise_content')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-form__btn">
                                        <a href="/weight_logs" class="back">戻る</a>
                                        <button type="submit">追加</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-table">
                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <th class="table-label">日付</th>
                            <th class="table-label">体重</th>
                            <th class="table-label">食事摂取カロリー</th>
                            <th class="table-label">運動時間</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($weight_logs as $weight_log)
                        <tr class="table-row">
                            <td class="table-data">{{$weight_log->date}}</td>
                            <td class="table-data">{{$weight_log->weight}}</td>
                            <td class="table-data">{{$weight_log->calories}}</td>
                            <td class="table-data">{{$weight_log->exercise_time}}</td>
                            <td class="detail-link">
                                <a href="/weight_logs/{{ $weight_log->id }}" class="pen-img">
                                    <img src="{{ asset('/images/Vector.png') }}"  alt="ペンのアイコン" class="pen-icon"/>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="pagination">
            {{ $weight_logs->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection