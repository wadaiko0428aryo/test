<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\WeightTarget;

class RegisterStepController extends Controller
{
    public function showStep1()
    {
        return view('auth.register-step1');
    }

    public function processStep1(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // ユーザー作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ログイン処理
        Auth::login($user);

        // ステップ2へリダイレクト
        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        return view('auth.register-step2');
    }

    public function processStep2(Request $request)
    {
        $request->validate([
            'target_weight' => 'required|numeric|min:30|max:200',
        ]);

        // `weight_target` にデータを登録
        WeightTarget::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->target_weight,
        ]);

        // トップページへリダイレクト
        return redirect()->route('weight.index');
    }
}