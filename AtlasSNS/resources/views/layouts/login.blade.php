<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link href="{{ asset('js/script.js') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">

    <!--スマホ,タブレット 対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
          <h1><a href='/top'><img src="{{ asset('images/atlas.png') }}"></a></h1>
            <nav class="ac-menu">
                <div class="ac-parent">
                    <?php $user=Auth::user();
                          $following_count=auth()->user()->getFollowingCount($user->id);
                          $followed_count=auth()->user()->getFollowedCount($user->id);
                    ?>
                    <p>{{$user->username}}<p class="ac-name">さん</p></p>
                    <span></span>
                    <img class="icon ac-icon" src="{{asset('storage/images'.$user->images)}}">
                </div>
                <ul>
                    <li class="text-center"><a href="/top">ホーム</a></li>
                    <li class="text-center"><a href="/profile">プロフィール編集</a></li>
                    <li class="text-center"><a href="/logout">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{$user->username}}さんの</p>
                <div>
                  <label>フォロー数</label>
                  <p>{{$following_count}}名</p>
                </div>
                <button type="submit" class="btn btn-blue"><a href="/follow-list">フォローリスト</a></button>
                  <div>
                    <label>フォロワー数</label>
                    <p>{{$followed_count}}名</p>
                  </div>
                <button type="submit" class="btn btn-blue"><a href="/follower-list">フォロワーリスト</a></button>
            </div>
            <button type="submit" class="btn btn-blue search-btn"><a href="/search">ユーザー検索</a></button>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}" rel="stylesheet"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <footer>
    </footer>

</body>
</html>
