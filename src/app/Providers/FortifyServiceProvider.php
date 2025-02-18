<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use App\Models\User;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Laravel\Fortify\Contracts\LoginResponse::class, \App\Http\Responses\LoginResponse::class);
    }

    public function boot()
    {
        // ユーザー作成時のロジックを指定
        Fortify::createUsersUsing(CreateNewUser::class);
        
        // パスワード更新やリセットのロジック
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);

        // ログイン画面
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // 新規登録画面
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // ログイン処理
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });

        // パスワードリセット画面
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        // メール認証画面
        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });

        // ログアウト後のリダイレクト設定
        $this->app->singleton(\Laravel\Fortify\Contracts\LogoutResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\LogoutResponse {
                public function toResponse($request)
                {
                    return redirect('/weight_logs/step2');
                }
            };
        });
    }
}