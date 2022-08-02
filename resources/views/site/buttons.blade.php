<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
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

            </div>
        </div>
    </div>
</div>


<div class="wrapper">
        <section class="page-header page-header-xs" id="Reg">
            <div class="container">
                <div class="row">
                    <h1>التحكم</h1>

                </div>

            </div>
        </section>
        <section class="mb-5" style="padding: 30px;padding-bottom: 90px;">
            <div class="container">
                <div class="row m-0">


                    <a href="{{ route('open') }}" class="btn btn-success mt-4 mr-2">تشغيل الموقع</a>
                    <a href="{{ route('close') }}" class="btn btn-danger red-border mt-4 mr-2">تشغيل وضع الصيانة </a>
                    <a href="{{ route('reserve.button', ['status' => 'on']) }}" class="btn btn-success mt-4 mr-2">تفعيل الحجز</a>
                    <a href="{{ route('reserve.button', ['status' => 'off']) }}" class="btn btn-danger red-border mt-4 mr-2">اغلاق الحجز </a>


                </div>
            </div>
        </section>
    </div>

    <style>
        div.heading-title.heading-border {
            padding-right: 15px;
            text-align: right;
            border-left: 0px;
            border-right: 5px solid rgb(204, 204, 204);
            padding-left: 15px;
        }
        div.heading-title {
            position: relative;
            margin-bottom: 110px;
        }
        div.heading-title h2 {
            padding-right: 0px !important;
            padding-left: 15px !important;
        }
        p {
            margin-bottom: 30px;
        }
        div.cond h3 {
            border: 1px solid rgb(204, 204, 204);
            margin-top: 30px;
            padding: 13px 20px;
            font-size: 15px;
            color: rgb(51, 51, 51);
            cursor: pointer;
            font-size: 16px;
        }
        div.cond p {margin-bottom: 0}
        a.extract {
            background-color: #6c6d70;
            color: #FFF !important;
            margin-left: 3px;
        }
        div.reserve-wrapper {
            background-color: rgba(0,0,0,0.05);
            padding: 6px;
            border: rgba(0,0,0,0.1) 1px solid;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

    </style>


@include('site.layouts.footer')
