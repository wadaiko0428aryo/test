<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\Auth\RegisterStepController;


Route::middleware(['auth'])->group(function () {
    // 目標体重設定画面の表示
    Route::get('/weight_logs/goal_setting', [WeightController::class, 'goalSetting']);
    // topページ表示
    Route::get('/weight_logs' , [WeightController::class , 'index'])->name('weight.index');
    // 検索機能
    Route::get('/weight_logs/search' , [WeightController::class , 'search']);
    // 詳細ページ表示
    Route::get('/weight_logs/{weightLogId}' , [WeightController::class , 'detail']);
    // 詳細ページから更新機能
    Route::put('/weight_logs/{weightLogId}/update' , [WeightController::class , 'updateWeight']);
    // 詳細ページから削除機能
    Route::post('/weight_logs/{weightLogId}/delete' , [WeightController::class , 'delete']);
    // 追加、登録機能
    Route::post('/weight_logs/create', [WeightController::class, 'storeWeightLog']);
    // 目標体重設定の更新機能
    Route::put('/weight_logs/goal_setting/update', [WeightController::class, 'updateGoalWeight']);

});

    Route::get('/register/step1', [RegisterStepController::class, 'showStep1'])->name('register.step1');
    Route::post('/register/step1', [RegisterStepController::class, 'processStep1']);

    Route::get('/register/step2', [RegisterStepController::class, 'showStep2'])->name('register.step2');
    Route::post('/register/step2', [RegisterStepController::class, 'processStep2']);

