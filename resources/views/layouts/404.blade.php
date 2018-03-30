<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>404</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:image" content="path/to/image.jpg">
    <link rel="shortcut icon" href="../../../../public/app/img/favicon/favicon.ico" type="image/x-icon">
    <meta class="theme-color" name="theme-color" content="#fff">
    <meta class="theme-color" name="msapplication-navbutton-color" content="#fff">
    <meta class="theme-color" name="apple-mobile-web-app-status-bar-style" content="#fff">
    <style>
        body {
            opacity: 0;
            overflow-x: hidden;
        }
        html {
            background-color: #fff;
        }
        /*body, html{*/
        /*height: auto;*/
        /*}*/
        svg line {
            stroke: grey;
            stroke-width: 2;
        }
    </style>
</head>
<body>
<div class="error404" style="background-image: url('../../../../public/app/img/laptop.jpg')">
    <div class="error404-overlay">
        <div class="my-container">
            <div class="header404">COMPAS</div>
            <div class="content404">
                <div class="content404-number">404</div>
                <div class="content404-text">Whoops... Page Not Foud !!!</div>
                <div>
                    <a href="{{ route('show_index') }}">
                        <div class="content404-btn">Go Home</div>
                    </a>
                </div>
            </div>
            <div class="social404">
                <div class="social">
                    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="//yastatic.net/share2/share.js"></script>
                    <div class="ya-share2"
                         data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('app/css/main.min.css') }} " rel="stylesheet"/>
</body>
</html>