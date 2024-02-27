


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--スマホ,タブレット対応-->
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
            <div id="">
                <div id="accordion" class="accordion-container">
                    <div class="atlas_image">
                        <a href="/top" class="header_image" ></a>
                    </div>
                    <div class="head_username">{{ Auth::user()->username }}さん
                    </div>
                    <div  class="accordion-title js-accordion-title">
                    </div>
                            <div class="accordion-content">
                                <ul>
                                    <li><a href="/top">ホーム</a></li>
                                    <li><a href="/profile">プロフィール編集</a></li>
                                    <li><a href="/logout">ログアウト</a></li>
                                </ul>
                            </div>
                    <div class="icon">
                        <img src="{{asset('storage/images/'.Auth::user()->images)}}">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p class="side_username">{{ Auth::user()->username }}さんの</p>
                <div class="f_count">
                    <p>フォロー数</p>
                    <p>{{Auth::user()->follows()->count()}}名</p>
                </div>
                <div class="f_btn">
                    <button type="submit" class="btn btn-primary"><a href="/follow-list">フォローリスト</a></button>
                </div>
                <div class="f_count">
                    <p>フォロワー数</p>
                    <p>{{Auth::user()->followers()->count()}}名</p>
                </div>
                <div class="f_btn">
                    <button type="submit" class="btn btn-primary"><a href="/follower-list">フォロワーリスト</a></button>
                </div>
            </div>
            <div class="search_btn">
                <button class="btn btn-primary"><a href="/search">ユーザー検索</a></button>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('/js/script.js')}}"></script>
</body>
</html>
