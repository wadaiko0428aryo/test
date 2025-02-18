<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    @yield('auth.css')
</head>

<body>

    <div class="all">
        <div class="form">

            <div class="form-title">
                <h2 class="main-title">PiGLy</h2>
                <span class="sub-title">@yield('sub-title')</span>
            </div>

            @yield('step-label')

            <div class="form-input">
                @yield('form')
            </div>

        </div>
    </div>

</body>
</html>