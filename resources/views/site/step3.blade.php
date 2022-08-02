
@extends('site.layouts.master')


@section('css')

    <style>
        section.stepA {
            border: 1px solid rgb(204, 204, 204);
            border-radius: 6px;
            padding: 20px 0;
            margin-top: 40px;
        }
        section.stepB {
            border: 1px solid rgb(204, 204, 204);
            border-radius: 6px;
            padding: 20px 0;
            margin-top: 40px;
            padding-top: 0;
        }
        .cell-detail {
            line-height: 40px;
            padding-right: 20px;
            border-radius: 0.25rem;
            font-size: 16px;
            background-color: #f7f7f9 !important;
        }
        a.nextbtn {
            margin-bottom: 110px;
            margin-top: 20px;
            padding: 6px 25px;
        }
        div.promise {
            background-color: #fdf7dd;
            margin-top: 19px;
        }
        div.promise label {
            color: #000;
            margin-right: 12px;
            padding: 10px;
        }
        div.promise input {
            margin-top: 12px;
        }
        a:disabled,
        a[disabled]{
            border: 1px solid #cccccc;
            background-color: #cccccc!important;
            color: #666666!important;
        }

    </style>

@endsection

@section('content')

    @php
        $land = session()->get('land')
    @endphp
    <div class="wrapper">
        <section class="page-header page-header-xs" id="Reg">
            <div class="container">
                <div class="row">
                    <h1>استمارة حجز ارض</h1>
                    <h1>&nbsp;-&nbsp;
                        <span></span>
                    </h1>
                </div>
            </div>
        </section>
        <div class="container">
            <section class="stepA">
                <div class="row m-0">
                    <div class="col-6">
                        <h3 class="font-16">الرقم القومي</h3>
                        <h4 class="cell-detail h-40p">
                            @if(request()->session()->has('logged'))
                                {{ request()->session()->get('user')->national_id }}
                            @endif
                        </h4>
                        <h3 class="font-16">تاريخ الميلاد</h3>
                        <h4 class="cell-detail h-40p">
                            @if(request()->session()->has('logged'))
                                @php
                                    $cuted = substr(request()->session()->get('user')->national_id, 1, 6);
                                @endphp

                                {{ preg_replace("/(\d{2})(\d{2})(\d{2})/", '19$1-$2-$3', $cuted) }}
                            @endif
                        </h4>
                    </div>
                    <div class="col-6">
                        <h3 class="font-16">اسم المتقدم طبقا للرقم القومي</h3>
                        <h4 class="cell-detail h-40p">
                            @if(request()->session()->has('logged'))
                                {{ request()->session()->get('user')->name }}
                            @endif
                        </h4>
                        <h3 class="font-16">الرقم المطبوع اسفل الصورة بالرقم القومي</h3>
                        <h4 class="cell-detail h-40p">
                            @if(request()->session()->has('logged'))
{{--                                {{ request()->session()->get('user')['noPrintedBelowImgInID'] }}--}}
                            @endif
                        </h4>

                    </div>

                </div>
            </section>

            <section class="stepB">
                <h4 class="green-bg white py-3 pl-2"> بيانات سداد جدية الحجز و طريقة السداد</h4>
                <div class="row mt-3 mx-0">

                    <div class="col-6">
                        <h3 class="font-16">تاريخ ايصال السداد</h3>
                        <h4 class="paymentDate cell-detail h-40p"></h4>
                        <h3 class="font-16">رقم مستند السداد</h3>
                        <h4 class="paymentNo cell-detail h-40p"></h4>
                    </div>
                    <div class="col-6">

                        <h3 class="font-16">طريقةالسداد</h3>
                        <h4 class="paymentMethods cell-detail h-40p"></h4>


                    </div>

                </div>
            </section>

            <section class="stepB">
                <h4 class="green-bg white py-3 pl-2"> بيانات شخصيه</h4>
                <div class="row mt-3 mx-0">
                    <div class="col-6">
                        <h3 class="font-16">بلد الجنسيه </h3>
                        <h4 class="cell-detail h-40p">مصر</h4>

                        <h3 class="font-16 mt-4">رقم التليفون </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['phoneNo'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">محل الاقامه </h3>
                        <h4 class="cell-detail h-40p">مصر</h4>

                        <h3 class="font-16 mt-4">العنوان </h3>
                        <h4 class="cell-detail h-40p" style="line-height: 21px;">
{{--                            {{ request()->session()->get('user')['address'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">اسم الزوج/الزوجه طبقا للرقم القومي </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['partnerName'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">صورة الرقم القومي </h3>
                        <h4 class="cell-detail h-40p"></h4>
                    </div>
                    <div class="col-6">
                        <h3 class="font-16">رقم المحمول </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['phoneNo'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">عنوان البريد الالكتروني </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['mail'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">المحافظة </h3>
                        <h4 class="cell-detail h-40p">الشرقيه</h4>

                        <h3 class="font-16 mt-4">الحاله الاجتماعيه</h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['socialStuts'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">الرقم القومي للزوج / الزوجه </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['partnerId'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">صورة الرقم القومي للزوج / الزوجه</h3>
                        <h4 class="cell-detail h-40p">File.jpg</h4>
                    </div>

                </div>
            </section>

            <section class="stepB">
                <h4 class="green-bg white py-3 pl-2"> بيانات الارض</h4>
                <div class="row mt-3 mx-0">
                    <div class="col-6">
                        <h3 class="font-16">المحافظة</h3>
                        <h4 class="gov cell-detail h-40p">{{ $land->gov }}</h4>

                        <h3 class="font-16 mt-4">المنطقة</h3>
                        <h4 class="city cell-detail h-40p">{{ $land->region }}</h4>

                        <h3 class="font-16 mt-4">المجاورة</h3>
                        <h4 class="subDistrict cell-detail h-40p">{{ $land->sub_district }}</h4>

                        <h3 class="font-16 mt-4">المساحه </h3>
                        <h4 class="area cell-detail h-40p">{{ $land->area }}</h4>

                    </div>
                    <div class="col-6">
                        <h3 class="font-16">المدينة</h3>
                        <h4 class="city cell-detail h-40p">{{ $land->city }}</h4>

                        <h3 class="font-16 mt-4">الحى</h3>
                        <h4 class="district cell-detail h-40p">{{ $land->district }}</h4>

                        <h3 class="font-16 mt-4">رقم القطعة</h3>
                        <h4 class="land cell-detail h-40p">{{ $land->land }}</h4>

                        <h3 class="font-16 mt-4">نسبة التميز</h3>
                        <h4 class="excellence cell-detail h-40p">{{ $land->excellence }}</h4>

                        <!-- <h3 class="font-16 mt-4">نوع الوحده</h3>
                          <h4 class="cell-detail h-40p">???</h4>

                          <h3 class="font-16 mt-4">رقم الوحده السكنيه</h3>
                          <h4 class="cell-detail h-40p">???</h4>

                          <h3 class="font-16 mt-4">نموذج الوحده  </h3>
                          <h4 class="cell-detail h-40p">???</h4>

                          <h3 class="font-16 mt-4">نوع الدور</h3>
                          <h4 class="cell-detail h-40p">???</h4> -->
                    </div>

                </div>
            </section>
            <div class="promise custom-control custom-checkbox">
                <input type="checkbox" id="customCheck1" [(ngModel)]="checkboxValue" (change)="toggleEditable()">
                <label class="custom-control-label" for="customCheck1">أقر بصحة البيانات و المستندات المقدمه مني و اتحمل كامل المسؤليه المدنيه والجنائيه و في حالة مخالفة هذه البيانات او
                    المستندات للحقيقه يعتبر الطلب لاغي ولا يعتد به دون ادني مسؤليه علي الجهة الاداريه او بنك التعميد و الاسكان</label>
            </div>

            <div class="text-center">
                <a href="{{ route('step4') }}"  class="btn green-bg white nextbtn">ارسال الطلب</a>
                <a href="{{ route('step2') }}" style="background-color: #565a5b" class="btn white nextbtn mr-3">رجوع للتعديل</a>
            </div>

            <div class="m-5"></div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $('.paymentDate').text(localStorage.getItem("paymentDate"));
        $('.paymentNo').text(localStorage.getItem("paymentNo"));
        $('.paymentMethods').text(localStorage.getItem("paymentMethods"));
    </script>
@endsection
