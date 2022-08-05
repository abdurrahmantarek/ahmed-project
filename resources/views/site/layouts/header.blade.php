<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/green.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-rtl-merged.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/header-1.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    @yield('css')

    <style>

        body {
            color: #666;
            background-color: #fff;
            font-family: 'Cairo',Helvetica,sans-serif!important;
            -webkit-font-smoothing: antialiased;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
        .green {color: #61a844!important;}
        .green-border {border-color: #61a844!important;}
        .white {color: #fff!important;}
        .green-bg {background-color: #61a844!important;}
        .grey-bg {background-color: #f7f7f9 !important;}
        a:hover {text-decoration: none;}
        .pointer {cursor: pointer;}
        .lighter {font-weight: lighter!important;}
        .h-40p {height: 40px;}
        .font-16 {font-size: 16px;}
        .font-15 {font-size: 15px;}
        .cell-detail {
            line-height: 40px;
            padding-right: 20px;
            border-radius: 0.25rem;
            font-size: 16px;
            background-color: #f7f7f9 !important;
        }
        ngb-datepicker {
            width: 235px!important;
        }
        .dropdown-menu, input.form-control.h-40p {
            right: 80%!important;
        }

        html, body { height: 100%; }
        body { margin: 0; font-family: 'Roboto', sans-serif; }

        footer {
            position: fixed;
            width: 100%;
            bottom: 0;
        }


        ul#topMain li a {
            cursor: pointer;
        }

        #header.fixed {
            position: fixed;
            border-bottom: rgba(0, 0, 0, 0.08) 1px solid;
        }

        @media (min-width: 992px) {
            .navbar-toggleable-md {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
                -webkit-flex-wrap: nowrap;
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
            }
        }
        @media (max-width: 992px) {
            #topMain {
                background-color: #fff;
                color: #687482;
                display: block;
            }
            #topMain li {
                display: inline-block !important;
                float: right;
                text-align: right;
                border-radius: 0;
                border-bottom: none;
            }
            #header #topNav #topMain>li>a {
                height: 40px !important;
                line-height: 40px !important;
                padding-top: 0;
                color: #687482 !important;
                font-weight: 400;
                background-color: transparent;
                font-size: .81em!important;
                display: block;
                position: relative;
                padding-left: 15px;
                padding-right: 15px;
            }
        }

    </style>
    <title>Document</title>
    @livewireStyles

</head>
<body>
<div id="wrapper">
    <div id="header" class="navbar-toggleable-md sticky clearfix">
        <div id="topNav">
            <div class="container">
                <a class="logo float-left col-lg-5 col-md-6 col-sm-4 col-xs-9">
                    <img class="img-fluid" src="{{ asset('assets/img/logo.png') }}" alt="" />
                    <img class="img-fluid" src="{{ asset('assets/img/logo.png') }}" alt="" />
                </a>
                <a class="logo float-right col-lg-5 col-md-6 col-sm-4 col-xs-9" >
                    <img class="img-fluid" src="{{ asset('assets/img/UrbanCommunitiesAuthority.png') }}" alt="" style="float: left;"  />
                    <img class="img-fluid" src="{{ asset('assets/img/UrbanCommunitiesAuthority.png') }}" alt="" style="float: left;" />
                </a>

                <div class="navbar float-left submenu-dark">
                    <nav class="nav-main">
                        <ul *ngIf="!auth" id="topMain" class="nav nav-pills nav-main">
                            <li class="active">
                                <a class="fs-15" href="{{ route('home') }}">الرئيسية</a>
                            </li>
                            <li class="active">
                                <a class="fs-15" >المشاريع</a>
                            </li>
                            <li class="active">
                                <a class="fs-15">الأسئلة الشائعة</a>
                            </li>
                            <li class="active">
                                <a class="fs-15">عن الموقع</a>
                            </li>

                            <li class="active">
                                <a class="fs-15">تسجيل مستخدم جديد</a>
                            </li>
                            @if(!request()->session()->has('logged'))
                            <li class="active">
                                <a class="fs-15" href="{{ route('login') }}" >دخول مستخدم حالي</a>
                            </li>
                            @else
                            <li class="active">
                                <a class="fs-15" href="{{ route('logout') }}" >تسجيل خروج</a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
