<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>

<body>

    <div class="app">
        <div class="header">
            <div class="header-inner">
                <h1 class="header-title">
                    <a class="header-logo" href="/weight_logs">PiGLy</a>
                </h1>
                <div class="header-link">
                    <a href="/weight_logs/goal_setting" class="header-goal">
                        目標体重設定
                    </a>
                    <form action="/logout" method="post">
                    @csrf
                        <button class="logout" type="submit" >ログアウト</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>

    </div>

</body>
</html>