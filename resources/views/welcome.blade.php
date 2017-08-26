<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'KeikenDone') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">ホーム</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>
                        <a href="{{ route('register') }}">新規登録</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md logo">
                    KeikenDone
                </div>
                <p class="lead text-muted">
                    初めて経験することって不安がいっぱい。<br>
                    <b class="logo">KeikenDone</b>は経験者から経験談をシェアしてもらえるサービス。<br>
                    たくさんの人の経験談を聞いたら、最後はあなたの番。<br>
                    あなたが経験した世界で一つだけの経験談も聞かせてね。
                </p>
                <br>
                <div class="row">
                    @if (Route::has('login'))
                        @auth
                    <div class="col-md-6 col-md-offset-3">
                        <a href="{{ url('/home') }}" class="btn btn-default btn-block">ホーム</a>
                    </div>
                        @else
                    <div class="col-md-6">
                        <a href="{{ route('login') }}" class="btn btn-default btn-block">ログイン</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-block">新規登録</a>
                    </div>
                        @endauth
                    @endif
                </div>
                <img src="http://qr-official.line.me/L/35lOGheBpc.png" width="150" height="150">
                <div>@fmd6708u</div>
                <div>
                    <a href="https://line.me/R/ti/p/%40fmd6708u"><img height="36" border="0" alt="友だち追加" src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png"></a>
                </div>
            </div>
        </div>
    </body>
</html>
