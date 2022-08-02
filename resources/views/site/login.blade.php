
@extends('site.layouts.master')

@section('content')
    <section style="padding: 20px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="box-static box-border-top p-30">
                        <div class="box-title mb-30">
                            <h2 class="fs-20">دخول مستخدم حالي</h2>
                        </div>
                        <form
                            method="post"
                            action="{{ route('login.data') }}"
                            class="clearfix"
                        >
                            @csrf
                            <div class="form-group">
                                <label class="label">الرقم القومي</label>
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    formControlName="username"
                                    class="form-control"
                                    placeholder="الرقم القومي"
                                    required
                                />
                                <div class="help-block with-errors" style="color: red"></div>
                            </div>

                            <div class="form-group">
                                <label class="label">كلمة المرور</label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    formControlName="password"
                                    class="form-control"
                                    placeholder="كلمة المرور"
                                    required
                                />
                                <span
                                    toggle="#password"
                                    class="fa fa-fw fa-eye field-icon toggle-password"
                                    style="margin-left: 5px"
                                ></span>
                                <div class="help-block with-errors" style="color: red"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-6">
                                    <button
                                        type="submit"
                                        class="btn green-bg white green-border"
                                    >
                                        الدخول
                                    </button>
                                </div>
                                <div class="col-md-1 col-sm-6 col-xs-6 text-center"></div>
                                <div class="col-md-8 col-sm-6 col-xs-6 text-center">
                                    <div class="form-tip pt-10">
                                        <a class="green" style="font-weight: bold"
                                        >نسيت كلمة المرور / ارسل كلمة مرور جديدة؟</a
                                        >
                                    </div>
                                </div>
                            </div>

                            @if($errors->first('login'))
                            <small
                                class="text-danger"
                            >الرقم القومي او كلمة المرور غير صحيحه
                            </small>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('css')

    <style>

        .box-static {
            text-align: right;
            background-color: rgba(0, 0, 0, 0.05);
            padding: 30px !important;
            /* border-top: 3px solid transparent; */
            border-radius: 3px;
        }

        .box-static.box-border-top {
            border-top: 3px solid #61a844;
        }

        .fs-20 {
            font-size: 20px !important;
        }

        h2 {
            margin: 0px 0px 32px;
        }

        .mb-30 {
            margin-bottom: 30px !important;
        }

        .box-static .box-title {
            border-bottom: 1px solid #f7f7f9;
        }

        form label {
            font-weight: normal;
        }

        .form-control {
            box-shadow: none;
            border-width: 2px;
            border-style: solid;
            border-color: rgb(221, 221, 221);
            border-image: initial;
            border-radius: 3px;
            height: 40px;
        }

        button:disabled,
        button[disabled] {
            border: 1px solid #cccccc;
            background-color: #cccccc !important;
            color: #666666 !important;
        }

        div.cap img {
            width: 60%;
            margin: 5px 0 20px 0;
        }
        div.cap {position: relative;}
        div.cap input {
            position: absolute;
            width: 28px;
            top: 30px;
            right: 14px;
            height: 28px;
        }
        @media (max-width: 1200px) {
            div.cap input {
                width: 22px;
                top: 25px;
                right: 12px;
                height: 22px;}
        }
        @media (min-width: 992px) {
            .offset-md-3 {
                margin-right: 25%;
                margin-left: 0px;
            }

            .col-md-6 {
                width: 50%;
            }
        }

    </style>
@endsection
