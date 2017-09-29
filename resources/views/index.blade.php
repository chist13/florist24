<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>florist24</title>

    <script async src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('vue-styles.css') !!}" />

    <style>
        .client-detail {
             height: initial;
        }
        .list-enter-active, .list-leave-active {
            transition: all 1s;
        }
        .list-enter {

        }

        .list-leave-to, .list-enter {
            opacity: 0;
            transform: translateX(30px);
        }

        .my-gender >span {
            width: 2em;
            height: 2em;
            margin: auto;
            display: flex;
            color: white;
            justify-content: center;
            align-items: center;
        }

        body.mini-navbar .navbar-static-side {
            position: absolute;
            z-index: 999;
            display: block !important;
        }

        .snotify svg {
            display: none;
        }

        #page-wrapper {
            min-height: 100vh;
        }

        .snotifyToast__title {
            font-weight: 700;
            color: #fff
        }

        .snotifyToast__body {
            -ms-word-wrap: break-word;
            word-wrap: break-word
        }

        .snotify-leftTop {
            left: 15px;
            top: 15px;
        }

        .snotify-leftCenter {
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
        }

        .snotify-leftBottom {
            left: 15px;
            bottom: 15px;
        }

        .snotify-rightTop {
            right: 15px;
            top: 15px;
        }

        .snotify-rightCenter {
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }

        .snotify-rightBottom {
            right: 15px;
            bottom: 15px;
        }

        .snotify-centerTop {
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
        }

        .snotify-centerCenter {
            left: 50%;
            top: 50%;
            transform: translate(-50%);
        }

        .snotify-centerBottom {
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
        }

        .snotify {
            position: fixed;
            z-index: 999999;
        }

        .snotify * {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        .snotify-success {
            background-color: #1ab394;
        }

        .snotify-error {
            background-color: #ed5565;
        }

        .snotify-info {
            background-color: #23c6c8;
        }

        .snotify-warning {
            background-color: #f8ac59;
        }

        .snotify-async {
            background-color: #2095f2;
        }

        .snotify-progress {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            background-color: #000;
            opacity: .4;
            -ms-filter: alpha(Opacity=40);
            filter: alpha(opacity=40)
        }

        /* Toastr custom style */
        .snotify > .snotifyToast:before {
            position: fixed;
            font-family: FontAwesome;
            font-size: 24px;
            line-height: 24px;
            float: left;
            color: #FFF;
            padding-right: 0.5em;
            margin: auto 0.5em auto -1.5em;
        }
        .snotify > .snotify-warning:before {
            content: "\f0e7";
        }
        .snotify > .snotify-error:before {
            content: "\f071";
        }
        .snotify > .snotify-info:before {
            content: "\f005";
        }
        .snotify > .snotify-success:before {
            content: "\f00C";
        }
        .snotify > .snotify-async:before {
            content: "\f110";
            padding-right: 0;
            animation: snotify-async .6s steps(8) infinite;
        }

        @keyframes snotify-async {
            from {
                transform: rotate(0)
            }

            to {
                transform: rotate(360deg)
            }
        }

        .snotifyToast__progressBar__percentage {
            height: 4px;
            background-color: #000;
            opacity: .4;
            display: block;
            -ms-filter: alpha(Opacity=40);
            filter: alpha(opacity=40)
        }

        .snotifyToast__progressBar {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            width: 100%;
        }

        .snotify > div {
            position: relative;
            overflow: hidden;
            margin: 0 0 6px;
            padding: 15px 15px 15px 50px;
            width: 300px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            background-position: 15px center;
            background-repeat: no-repeat;
            color: #fff;
            -moz-box-shadow: 0 0 3px #999;
            -webkit-box-shadow: 0 0 3px #999;
            box-shadow: 0 0 3px #999;
            opacity: .9;
            -ms-filter: alpha(opacity=90);
            filter: alpha(opacity=90);
        }

        .snotify > :hover {
            -moz-box-shadow: 0 0 4px #999;
            -webkit-box-shadow: 0 0 4px #999;
            box-shadow: 0 0 4px #999;
            opacity: 1;
            -ms-filter: alpha(opacity=100);
            filter: alpha(opacity=100);
            cursor: pointer;
        }

        .page-enter-active, .page-leave-active {
            transition: transform .3s, opacity .3s;
        }
        .page-enter, .page-leave-to {
            opacity: 0;
            transform: translateX(20px);
        }
    </style>
</head>
<body>
    <div id="app"></div>

    <script defer src="{!! asset('js/app.js') !!}"></script>
</body>
</html>