<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeightLogRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;


class WeightController extends Controller
{
    // トップページ表示
    public function index()
    {
        $weight_logs = WeightLog::paginate(8);
        $weight_targets = auth()->check() ? WeightTarget::where('user_id', auth()->id())->first() : null;

        return view('index', compact('weight_logs', 'weight_targets'));
    }

    // 日付の範囲検索機能
    public function search(Request $request)
    {
        $query = WeightLog::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }
        $weight_logs = $query->paginate(8);
        $weight_targets = auth()->check() ? WeightTarget::where('user_id', auth()->id())->first() : null;
        return view('index' , compact('weight_logs' , 'weight_targets'));
    }

    // データ詳細ページ表示
    public function detail($weight_log_id)
    {
        $weight_log = WeightLog::find($weight_log_id);

        if (!$weight_log) {
            // ログが見つからなければエラーページへリダイレクト
            return redirect('/weight_logs');
        }

        return view('detail', compact('weight_log'));
    }

    // 削除機能
    public function delete($weight_log_id)
    {
        $weight_log = WeightLog::find($weight_log_id);

        if ($weight_log) {
            $weight_log->delete();
        }

        $weight_log = WeightLog::paginate(8);
        return redirect('/weight_logs')->with(compact('weight_log'));
    }

    // 更新機能
    public function updateWeight(WeightLogRequest $request, $weight_log_id)
    {
        $weight_log = WeightLog::find($weight_log_id);

        $weight_log->update([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        $weight_log = WeightLog::paginate(8);
        return redirect('/weight_logs')->with(compact('weight_log'));
    }

    // モーダル&体重登録機能
    public function storeWeightLog(WeightLogRequest $request)
    {
        $weightLog = WeightLog::create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);


        return redirect('/weight_logs');
    }

    // 目標体重設定ページ表示（未実装）
    public function goalSetting()
    {
        // 目標体重設定データを取得（ログインユーザーの目標体重）
        $weight_target = Auth::user()->weight_target;
        return view('goal', compact('weight_target'));
    }

    // 目標体重設定の更新機能（未実施）
    //     public function updateGoal()
    // {
    //     return redirect('/weight_logs');
    // }


    // 初期体重登録ページ表示
    public function register2()
    {
        return view('register2');
    }

    // 初期体重登録処理
    public function storeInitialWeight(Request $request)
    {
        // ログインしているか確認
        if (!auth()->check()) {
          return redirect('/login'); // ログインしていない場合はログイン画面にリダイレクト
        }

        WeightTarget::create([
            'user_id' => auth()->id(),
            'current_weight' => $request->current_weight ?? 0, // もし入力されていなければ0をデフォルト値にする
            'target_weight' => $request->target_weight,
        ]);

        return redirect('/weight_logs');
    }










}
