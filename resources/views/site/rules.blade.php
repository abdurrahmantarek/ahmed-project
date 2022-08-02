
@extends('site.layouts.master')

@section('content')
    <div class="wrapper">
        <section class="page-header page-header-xs" id="Reg">
            <div class="container">
                <div class="row">
                    <h1>الشروط والأحكام</h1>

                </div>

            </div>
        </section>
        <section class="mb-5" style="padding: 30px;padding-bottom: 90px;">
            <div class="container">
                <div class="row m-0">


                    <div class="row m-0">
                        <div class="cond">
                            <p>
                                1. يقر المتقدم للحجز باطلاعه على كراسة الشروط وعلمه بكل ما جاء بها وقبوله لكافة الاشتراطات الموجودة بها.
                            </p>
                            <p>
                                2. يقر المتقدم للحجز باطلاعه على الشروط والاحكام الخاصة بالحجز الإلكتروني وعلمه وقبوله لها.
                            </p>
                            <p>
                                3. يقر المتقدم للحجز بمسئولياته الكاملة على الحفاظ على اسم المستخدم وكلمة السر الخاصة به على الموقع الالكتروني. وكذلك مسئولياته
                                الكاملة على كافة الاحداث التي تتم من خلال اسم المستخدم الممنوح له.
                            </p>
                            <p>
                                4. تعديل بيانات حجز الأراضي مسموح به اثناء الادخال فقط قبل ارسال طلب التسجيل.
                            </p>
                        </div>

                        <a href="{{ route('step1') }}" class="btn green-bg white green-border mt-4">اوافق علي الشروط و الاحكام</a>


                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('css')
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
@endsection
